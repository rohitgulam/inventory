<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'quantity',
        'price',
        'unit_sum',
        'credit',
        'profit',
        'creditor',
        'sell_by',
        'sell_to',
        'product_id',
        'description'
    ];
}
