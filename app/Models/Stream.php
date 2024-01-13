<?php

namespace App\Models;

use Carbon\Carbon;
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
    protected $table = "stream";

    protected $guarded = ["id"];
}
