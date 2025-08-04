<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodOrder extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'order_id'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'food_order_id');
    }
}
