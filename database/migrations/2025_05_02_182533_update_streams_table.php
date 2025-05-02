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
        Schema::table('streams', function (Blueprint $table) {
            $table->string("template_for_start")->nullable()->change();
            $table->string("template_for_finish")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('streams', function (Blueprint $table) {
            $table->string("template_for_start")->change();
            $table->string("template_for_finish")->change();
        });
    }
};
