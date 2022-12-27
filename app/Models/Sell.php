<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sell extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product',
        'quantity',
        'price',
        'unit_sum',
        'credit',
        'profit',
        'creditor',
        'paid_amount',
        'sell_by',
        'sell_to',
        'product_id',
        'description'
    ];
}
