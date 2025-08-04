<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_order_id')->constrained('food_orders')->onDelete('cascade');
            $table->foreignId('food_inventory_id')->constrained('food_inventories')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
            $table->index('food_order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
