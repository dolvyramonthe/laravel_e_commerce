<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'desc', 'price', 'image_path', 'is_available', 'poppings', 'sugar_quantity', 'size',
];
 
}
