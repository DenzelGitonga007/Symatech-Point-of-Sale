<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // Define the table
    protected $table = 'orders';

    // Define the fillable fields
    protected $fillable = [
        'name',
        'address',
        
    ];
}
