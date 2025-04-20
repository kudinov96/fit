<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $title_ru
 * @property string $title_lv
 * @property string $title_en
 * @property string $title
 * @property string $target_type
 * @property string $menu_type
 * @property int    $height_from
 * @property int    $height_to
 * @property int    $weight_from
 * @property int    $weight_to
 * @property string $file_ru
 * @property string $file_lv
 * @property string $file_en
 * @property string $file
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class MealPlan extends Model
{
    protected $table = "meal_plans";

    protected $guarded = ["id"];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{"title_" . app()->currentLocale()},
        );
    }

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{"file_" . app()->currentLocale()},
        );
    }
}
