<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель потока
 *
 * @property int $id
 * @property Carbon $start_date Дата начала
 * @property string $template_for_start Файл шаблона для старта
 * @property string $template_for_finish Файл шаблона для финиша
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
}
