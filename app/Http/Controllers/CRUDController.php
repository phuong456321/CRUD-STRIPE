<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $products = DB::table('products')->get();
        return view('admin/admin',['products' => $products]);
    }
    public function newProduct()
    {
        return view('admin/create');
    }
    public function createProduct(Request $request)
    {
        // $request->validate([
        //     'product_id' => 'required|string|max:255',
        //     'product_name' => 'required|string|max:255',
        //     'quantity' => 'required|numeric|min:1' ,
        //     'price' => 'required|min:1|integer',
        //     'currency' => 'required|max:255',
        // ]);

        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $quantity = $request->quantity;
        $price = $request->price;
        $currency = $request->currency;
        DB::table('products')->insert([
            ['product_id' => $product_id, 'product_name' => $product_name, 'quantity' => $quantity, 'price' => $price, 'currency' => $currency, 'created_at' => now(), 'updated_at' => now()]
        ]);
        return redirect('admin');
    }

    function delete($code)
    {
        DB::table('products')->where('product_id', $code)->delete();
        return redirect('admin');
    }


    function displayEdit($code)
    {
        $product = DB::table('products')->where('product_id', $code)->first();
        return view('admin/edit', ['product' => $product]);
    }

    function edit(Request $request, $code)
    {
        $product_name = $request->product_name;
        $quantity = $request->quantity;
        $price = $request->price;
        $currency = $request->currency;
        DB::table('products')->where('product_id', $code)->update([ 'product_name' => $product_name, 'quantity' => $quantity, 'price' => $price, 'currency' => $currency, 'updated_at' => now()]);
        return redirect('admin');
    }
}
