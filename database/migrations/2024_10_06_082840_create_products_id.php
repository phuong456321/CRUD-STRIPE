<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('price');
            $table->string('currency');
            $table->timestamps();
        });
        DB::table('products')->insert([
            ['product_id'=>'245789','product_name' => 'Default Product 1','quantity' => 50, 'price' => 10,'currency'=>'USD', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => '485749','product_name' => 'Default Product 2','quantity' => 100, 'price' => 20,'currency'=>'USD', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
