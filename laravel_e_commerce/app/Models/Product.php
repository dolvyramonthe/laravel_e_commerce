<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Order;

class Product extends Model
{
    public $table = 'products';

    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'price',
        'image_path',
        'is_available',
        'poppings',
        'sugar_quantity',
        'size',
    ];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredients')
                    ->withTimestamps();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_products')
                    ->withPivot('quantity', 'total_amount')
                    ->withTimestamps();
    }
}
