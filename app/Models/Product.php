<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category',
        'branch',
        'quality',
        'metric',
        'selling_price',
        'buying_price',
        'bonus',
        'quantity',
        'deleted',
    ];
}
