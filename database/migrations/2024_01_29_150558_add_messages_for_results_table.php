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
        Schema::table('results', function (Blueprint $table) {
            $table->text("message_user")->nullable();
            $table->text("message_admin")->nullable();
            $table->dateTime("message_user_date")->nullable();
            $table->dateTime("message_admin_date")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropColumn("message_user");
            $table->dropColumn("message_admin");
            $table->dropColumn("message_user_date");
            $table->dropColumn("message_admin_date");
        });
    }
};
