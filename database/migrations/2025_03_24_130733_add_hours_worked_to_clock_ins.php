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
        Schema::table('clock_ins', function (Blueprint $table) {
            //
            $table->integer('hours_worked')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clock_ins', function (Blueprint $table) {
            //
            $table->dropColumn('hours_worked');
        });
    }
};
