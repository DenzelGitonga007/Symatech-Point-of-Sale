<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Define the table
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'brand',
        'price',
        'quantity',
        'alert_stock',
        'description',
    ];
}
