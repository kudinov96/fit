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
        Schema::create('training', function (Blueprint $table) {
            $table->id();
            $table->string("title_ru");
            $table->string("title_en");
            $table->string("title_lv");
            $table->string("description_ru")->nullable();
            $table->string("description_en")->nullable();
            $table->string("description_lv")->nullable();
            $table->text("content_ru")->nullable();
            $table->text("content_en")->nullable();
            $table->text("content_lv")->nullable();
            $table->string("yt_video_id")->nullable();
            $table->smallInteger("week");
            $table->smallInteger("day");
            $table->string("where");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training');
    }
};
