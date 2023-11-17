<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'price', 'image_path', 'is_available'];

    public function price(): Attribute{
        return Attribute::make(
            get: fn($value) => str_replace('.', ',', $value / 100) . ' €'
        );
    }
 
}
