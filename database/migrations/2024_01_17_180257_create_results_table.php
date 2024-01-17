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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("type");
            $table->integer("weight");
            $table->integer("breast");
            $table->integer("waistline");
            $table->integer("hips");
            $table->integer("hand");
            $table->integer("leg");
            $table->string("photo_1")->nullable();
            $table->string("photo_2")->nullable();
            $table->string("photo_3")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
