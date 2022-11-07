<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'products',
        'quantity',
        'price',
        'unit_sum',
        'order_sum',
        'credit',
        'purchase_from',
        'purchase_by',
        'description'
    ];
}
