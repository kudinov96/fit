<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Модель пользователя
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property RoleEnum $role
 * @property string $phone
 * @property string $language
 * @property int $stream_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => RoleEnum::class,
    ];

    /**
     * Поток пользователя
     */
    public function stream(): BelongsTo
    {
        return $this->belongsTo(Stream::class, "stream_id");
    }

    /**
     * Начальный квиз
     */
    public function firstQuiz(): HasOne
    {
        return $this->hasOne(FirstQuiz::class, "user_id");
    }

    /**
     * Результаты
     */
    public function results(): HasMany
    {
        return $this->hasMany(Result::class, "user_id");
    }

    /**
     * Check-in опросник
     */
    public function checkIn(): HasMany
    {
        return $this->hasMany(CheckIn::class, "user_id");
    }

    /**
     * Имеет ли пользователь указанную роль
     */
    public function hasRole($role): bool
    {
        if ($this->role === $role) {
            return true;
        }

        return false;
    }
}
