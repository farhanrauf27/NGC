<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;

    protected $primaryKey = 'dis_code';

    protected $fillable = ['dis_code', 'dis_title', 'dis_brand', 'dis_pic','dis_price','dis_type','dis_bright'];
}
