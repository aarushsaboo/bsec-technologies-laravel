<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyData extends Model
{
    use HasFactory;
    
    protected $fillable = ['month', 'company_id', 'revenue'];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}