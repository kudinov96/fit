<?php

namespace App\Models;

use App\Enums\TrainingWhereEnum;
use App\Models\Traits\Position;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @property string $weeks Недели тренировки (1-6)
 * @property int    $day День тренировки (1-5)
 * @property TrainingWhereEnum $where Где проходит тренировка
 * @property int    $position Позиция при выдаче
 * @property int    $program_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Training extends Model
{
    use Position;

    protected $table = "training";

    protected $guarded = ["id"];

    protected $casts = [
        "where" => TrainingWhereEnum::class,
        "weeks" => "array",
    ];

    protected $appends = [
        "title",
        "description",
        "content",
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{"title_" . app()->currentLocale()},
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{"description_" . app()->currentLocale()},
        );
    }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{"content_" . app()->currentLocale()},
        );
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, "program_id");
    }
}
