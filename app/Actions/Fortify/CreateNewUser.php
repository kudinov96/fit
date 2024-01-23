<?php

namespace App\Actions\Fortify;

use App\Enums\RoleEnum;
use App\Models\User;
use App\Notifications\RegisterNotify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $password = Str::password();

        /** @var User $user */
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($password),
            'role' => $input['role'] ?? RoleEnum::USER->value,
            'phone' => $input['name'] ?? null,
            'language' => $input['language'] ?? 'lv',
            'stream_id' => $input['stream_id'],
        ]);

        $user->notify(new RegisterNotify($user, $password));

        return $user;
    }
}
