<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable =[
        'product',
        'quantity',
        'price',
        'unit_sum',
        'credit',
        'creditor',
        'purchase_by',
        'purchase_from',
        'product_id',
        'description'
    ];
}
