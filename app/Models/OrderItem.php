<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
        'food_order_id',
        'food_inventory_id',
        'quantity',
        'total_price',
    ];

    public function food()
    {
        return $this->belongsTo(FoodInventory::class, 'food_inventory_id');
    }

    public function order()
    {
        return $this->belongsTo(FoodOrder::class, 'food_order_id');
    }

}
