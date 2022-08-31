<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'image',
        'price',
        'quantity',
        'total',
        'user_id',

    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
