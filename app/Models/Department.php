<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Get the comments for the blog post.
     */
    protected $fillable = [
        'name',
        'image',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
