<?php

use App\Models\Training;
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
        Schema::table('training', function (Blueprint $table) {
            $table->jsonb("weeks")->nullable();
        });

        $trainings = Training::query()->get();

        foreach ($trainings as $training) {
            $training->weeks = [(string) $training->week];
            $training->save();
        }

        Schema::table('training', function (Blueprint $table) {
            $table->dropColumn("week");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training', function (Blueprint $table) {
            $table->dropColumn("weeks");
        });
    }
};
