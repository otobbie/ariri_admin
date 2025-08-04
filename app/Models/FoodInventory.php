<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodInventory extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'food_inventory_id');
    }
}
