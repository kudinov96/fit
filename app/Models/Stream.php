<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Модель потока
 *
 * @property int $id
 * @property string $title
 * @property Carbon $start_date Дата начала
 * @property string $template_for_start Файл шаблона для старта
 * @property string $template_for_finish Файл шаблона для финиша
 * @property string $template_info_book_lv
 * @property string $template_info_book_en
 * @property string $template_info_book_ru
 * @property string $template_info_book
 * @property string $template_recipe_book_lv
 * @property string $template_recipe_book_en
 * @property string $template_recipe_book_ru
 * @property string $template_recipe_book
 * @property string $group_chat Ссылка на групповой чат
 * @property int $program_id
 * @property bool $access_to_gym
 * @property bool $access_to_home
 * @property bool $access_to_meal_plan
 * @property bool $access_to_results
 * @property bool $access_to_check_in
 */
class Stream extends Model
{
    protected $table = "streams";

    protected $guarded = ["id"];

    protected $casts = [
        "start_date" => "date",
    ];

    protected $appends = [
        "status",
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->start_date >= now()->subWeeks(6) && $this->start_date <= now()) {
                    $status = __("активный");
                } elseif (now() > $this->start_date->addWeeks(6)) {
                    $status = __("завершен");
                } else {
                    $status = __("ждет старта");
                }

                return $status;
            },
        );
    }

    protected function templateInfoBook(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{"template_info_book_" . app()->currentLocale()},
        );
    }

    protected function templateRecipeBook(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{"template_recipe_book_" . app()->currentLocale()},
        );
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, "stream_id");
    }
}
