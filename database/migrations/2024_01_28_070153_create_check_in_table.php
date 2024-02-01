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
        Schema::create('check_in', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->foreignId("stream_id")->constrained("streams")->cascadeOnDelete();
            $table->boolean("training");
            $table->float("water");
            $table->float("sleep");
            $table->string("nutrition");
            $table->boolean("alcohol");
            $table->smallInteger("week");
            $table->smallInteger("day");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_in');
    }
};
