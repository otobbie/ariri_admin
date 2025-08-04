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
        Schema::create('access_controls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

          // Add foreign key to users table
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('access_control')->nullable()->constrained('access_controls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_controls');
    }
};
