<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    // Define the table
    protected $table = 'transactions';

    // Define the fillable fields
    protected $fillable = [
        'paid_amount',
        'balance',
        'payment_method',
        'transac_date',
        'transac_amount',
        
    ];
}
