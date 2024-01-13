<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'x:create-user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name     = $this->ask('Name');
        $email    = $this->ask('Email');
        $password = $this->ask('Password');
        $phone    = $this->ask('Phone');
        $language = $this->ask('Language', 'ru');
        $role     = $this->ask('Role');

        $roles = array_column(RoleEnum::cases(), 'value');

        if (!$role || !in_array($role, $roles)) {
            $this->error("Role not found");
            return;
        }

        User::factory()->create([
            "name"     => $name,
            "email"    => $email,
            "password" => Hash::make($password),
            "role"     => $role,
            "phone"    => $phone,
            "language" => $language,
        ]);

        $this->info("User $email was created");
    }
}
