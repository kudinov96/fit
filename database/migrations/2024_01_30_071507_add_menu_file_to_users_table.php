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
        Schema::table('users', function (Blueprint $table) {
            $table->string("menu_name")->nullable();
            $table->string("menu_file")->nullable();
            $table->boolean("is_custom_menu")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("menu_name");
            $table->dropColumn("menu_file");
            $table->dropColumn("is_custom_menu");
        });
    }
};
