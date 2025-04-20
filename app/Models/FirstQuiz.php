<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Модель начального квиза
 *
 * @property int $id
 * @property int $user_id
 * @property int $stream_id
 * @property int $age Возраст
 * @property float $height Рост
 * @property float $weight Вес
 * @property int $target Цель похудения
 * @property string $menu Вариант меню
 * @property string $nutritional_supplements Добавки и лекарства
 * @property string $health_problems Проблемы со здоровьем
 * @property string $experience Опыт тренировок
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property int $targetType
 */
class FirstQuiz extends Model
{
    protected $table = "first_quiz";

    protected $guarded = ["id"];

    protected $appends = [
        "targetType"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    protected function targetType(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (str_contains($this->target, "похудение")) {
                    return 'loss';
                }

                if (str_contains($this->target, "поддержка")) {
                    return 'support';
                }

                return 'gain';
            },
        );
    }
}
