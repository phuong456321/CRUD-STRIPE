<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        //Vilidator
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|min:1|integer',
        ]);

        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

        try {
            $response = $stripe->checkout->sessions->create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $request->product_name,
                            ],
                            'unit_amount' => $request->price * 100,
                        ],
                        'quantity' => $request->quantity,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
            ]);
            if (isset($response->id) && $response->id != '') {
                session()->put('product_name', $request->product_name);
                session()->put('price', $request->price);
                session()->put('quantity', $request->quantity);
                return redirect($response->url);
            } else {
                return response()->json(['error' => 'Failed to create checkout session'], 500);
            }
        } catch (ApiErrorException $e) {
            return redirect()->route('cancel')->with('error', $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        try {
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            $payment = new Payment();
            $payment->payment_id = $request->session_id;
            $payment->product_name = session()->get('product_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = session()->get('price');
            $payment->currency = $response->currency;
            $payment->payer_name = $response->customer_details->name;
            $payment->payer_email = $response->customer_details->email;
            $payment->payment_status = $response->payment_status;
            $payment->payment_method = "Stripe";
            $payment->save();
            session()->forget(['product_name', 'price', 'quantity']);
            return response("Payment is successfully", 200);
        } catch (ApiErrorException $e) {
            return redirect()->route('cancel')->with('error', $e->getMessage());
        }
    }

    public function cancel()
    {
        return response()->view('cancel', [
            'error' => 'Payment has been canceled. Please try again.',
        ]);
    }
}
