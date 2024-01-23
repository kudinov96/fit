<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель начального квиза
 *
 * @property int $id
 * @property int $user_id
 * @property int $stream_id
 * @property int $age Возраст
 * @property int $height Рост
 * @property int $weight Вес
 * @property int $target Цель похудения
 * @property int $menu Вариант меню
 * @property string $nutritional_supplements Добавки и лекарства
 * @property string $health_problems Проблемы со здоровьем
 * @property string $experience Опыт тренировок
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class FirstQuiz extends Model
{
    protected $table = "first_quiz";

    protected $guarded = ["id"];
}
