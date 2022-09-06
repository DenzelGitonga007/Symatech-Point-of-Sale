<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    // Define the table
    protected $table = 'order_details';

    // Define the fillable fields
    protected $fillable = [
        'product_id',
        'quantity',
        'unitprice',
        'amount',
        
    ];
}
