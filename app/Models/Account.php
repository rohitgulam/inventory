<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'revenue',
        'expenses',
        'profit',
        'loss',
    ];

    protected $dateFormat = 'Y-m-d';

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
