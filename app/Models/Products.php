<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'producs_id';
    protected $fillable = [
        'product_id',
        'product_name',
        'quantity',
        'price',
        'currency',
    ];
}
