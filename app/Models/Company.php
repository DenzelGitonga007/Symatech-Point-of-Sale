<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // Define the table
    protected $table = 'companies';

    // Define the fillable fields
    protected $fillable = [
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'company_fax',
    ];
}
