<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superfoods extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'productno',
        'category',
        'amount',
        'price'
        ];
}
