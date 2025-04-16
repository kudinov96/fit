<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Модель программ марафона
 *
 * @property int    $id
 * @property string $name
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Program extends Model
{
    protected $table = "programs";

    protected $guarded = ["id"];

    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class, "program_id");
    }
}
