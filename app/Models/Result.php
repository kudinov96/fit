<?php

namespace App\Models;

use App\Enums\ResultTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель результатов пользователей
 *
 * @property int $id
 * @property int $user_id
 * @property ResultTypeEnum $type Тип результата
 * @property int $weight Вес
 * @property int $breast Грудь
 * @property int $waistline Талия
 * @property int $hips Бедра
 * @property int $hand Рука
 * @property int $leg Нога
 * @property string $photo_1
 * @property string $photo_2
 * @property string $photo_3
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Result extends Model
{
    protected $table = "results";

    protected $guarded = ["id"];

    protected $casts = [
        "type" => ResultTypeEnum::class,
    ];
}
