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
            $table->foreignId("program_id")->nullable()->constrained("programs")->cascadeOnDelete();
            $table->string("title")->nullable();
            $table->string("template_info_book_lv")->nullable();
            $table->string("template_info_book_en")->nullable();
            $table->string("template_info_book_ru")->nullable();
            $table->string("template_recipe_book_lv")->nullable();
            $table->string("template_recipe_book_en")->nullable();
            $table->string("template_recipe_book_ru")->nullable();
            $table->boolean("access_to_gym")->default(true);
            $table->boolean("access_to_home")->default(true);
            $table->boolean("access_to_meal_plan")->default(true);
            $table->boolean("access_to_results")->default(true);
            $table->boolean("access_to_check_in")->default(true);
        });

        \Illuminate\Support\Facades\DB::table("streams")->update([
            "program_id" => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('streams', function (Blueprint $table) {
            $table->dropForeign(['program_id']);
            $table->dropColumn('program_id');
            $table->dropColumn("title");
            $table->dropColumn("template_info_book_lv");
            $table->dropColumn("template_info_book_en");
            $table->dropColumn("template_info_book_ru");
            $table->dropColumn("template_recipe_book_lv");
            $table->dropColumn("template_recipe_book_en");
            $table->dropColumn("template_recipe_book_ru");
            $table->dropColumn("access_to_gym");
            $table->dropColumn("access_to_home");
            $table->dropColumn("access_to_meal_plan");
            $table->dropColumn("access_to_results");
            $table->dropColumn("access_to_check_in");
        });
    }
};
