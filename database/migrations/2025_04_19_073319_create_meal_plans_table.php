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
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru')->nullable();
            $table->string('title_lv')->nullable();
            $table->string('title_en')->nullable();
            $table->string('target_type'); // loss | support | gain
            $table->string('menu_type');   // classic | GF | LF | vegetarian | vegan
            $table->unsignedSmallInteger('height_from')->nullable();
            $table->unsignedSmallInteger('height_to')->nullable();
            $table->unsignedSmallInteger('weight_from')->nullable();
            $table->unsignedSmallInteger('weight_to')->nullable();
            $table->string('file_ru')->nullable();
            $table->string('file_lv')->nullable();
            $table->string('file_en')->nullable();
            $table->timestamps();

            $table->index(['target_type', 'menu_type']);
        });

        Schema::table("users", function (Blueprint $table) {
            $table->foreignId("menu_id")->nullable()->constrained("meal_plans")->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("users", function (Blueprint $table) {
            $table->dropColumn("menu_id");
        });

        Schema::dropIfExists('meal_plans');
    }
};
