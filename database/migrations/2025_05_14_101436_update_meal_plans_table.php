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
        Schema::table('meal_plans', function (Blueprint $table) {
            $table->float('height_from')->nullable()->change();
            $table->float('height_to')->nullable()->change();
            $table->float('weight_from')->nullable()->change();
            $table->float('weight_to')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meal_plans', function (Blueprint $table) {
            $table->unsignedSmallInteger('height_from')->nullable()->change();
            $table->unsignedSmallInteger('height_to')->nullable()->change();
            $table->unsignedSmallInteger('weight_from')->nullable()->change();
            $table->unsignedSmallInteger('weight_to')->nullable()->change();
        });
    }
};
