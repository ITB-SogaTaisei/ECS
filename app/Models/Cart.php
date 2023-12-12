<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'stock',
        'image',
        'quantity',
    ];

    // カートに属する商品のリレーション
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
