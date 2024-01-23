<?php

namespace App\Models;

use App\Enums\TrainingWhereEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель тренировок марафона
 *
 * @property int    $id
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_lv
 * @property string $description_ru
 * @property string $description_en
 * @property string $description_lv
 * @property string $content_ru
 * @property string $content_en
 * @property string $content_lv
 * @property string $yt_video_id ID видео на YouTube
 * @property int    $week Неделя тренировки (1-6)
 * @property int    $day День тренировки (1-5)
 * @property TrainingWhereEnum $where Где проходит тренировка
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Training extends Model
{
    protected $table = "training";

    protected $guarded = ["id"];

    protected $casts = [
        "where" => TrainingWhereEnum::class,
    ];
}
