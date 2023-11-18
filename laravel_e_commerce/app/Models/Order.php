<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    public $table = 'orders';

    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        // other fields
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
                    ->withPivot('quantity', 'total_amount')
                    ->withTimestamps();
    }
}
