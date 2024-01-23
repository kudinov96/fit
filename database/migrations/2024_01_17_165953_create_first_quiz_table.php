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
        Schema::create('first_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->foreignId("stream_id")->constrained("streams")->cascadeOnDelete();
            $table->integer("age");
            $table->integer("height");
            $table->integer("weight");
            $table->text("target");
            $table->text("menu");
            $table->text("nutritional_supplements")->nullable();
            $table->text("health_problems")->nullable();
            $table->text("experience")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('first_quiz');
    }
};
