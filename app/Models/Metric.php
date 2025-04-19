<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'total_revenue',
        'revenue_growth',
        'average_transaction',
        'transaction_growth',
        'total_customers',
        'customer_growth'
    ];
}