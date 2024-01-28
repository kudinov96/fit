<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель Check-In опросника
 *
 * @property int $id
 * @property int $user_id
 * @property int $stream_id
 * @property boolean $training Была тренировка?
 * @property int $water Сколько литров воды выпили?
 * @property int $sleep Сколько часов спали?
 * @property string $nutrition Питание
 * @property boolean $alcohol Употребляли алкоголь?
 * @property int $week Неделя
 * @property int $day День
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class CheckIn extends Model
{
    protected $table = "check_in";

    protected $guarded = ["id"];
}
