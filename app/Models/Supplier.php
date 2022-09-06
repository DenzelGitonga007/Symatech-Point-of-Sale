<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    // Define the table
    protected $table = 'suppliers';

    // Define the fillable fields
    protected $fillable = [
        'supplier_name',
        'supplier_address',
        'phone',
        'email',
        
    ];
}
