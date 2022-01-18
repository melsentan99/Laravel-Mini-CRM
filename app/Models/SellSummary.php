<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellSummary extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'employee', 'created_date', 'last_update', 'price_total', 'discount_total', 'total'];
}
