<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'name',
        'image',
        'price',
        'quantity',
        'total',
        'status',
        'user_id',
    ];
}
