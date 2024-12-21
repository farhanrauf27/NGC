<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartItem extends Model
{
    use HasFactory;
    // Relationship with User
public function user()
{
    return $this->belongsTo(User::class);
}

// Relationship with Product
public function product()
{
    return $this->belongsTo(Product::class);
}

}
