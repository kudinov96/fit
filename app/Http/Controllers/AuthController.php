<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Laravel\Fortify\Actions\CompletePasswordReset;
use Laravel\Fortify\Contracts\FailedPasswordResetResponse;
use Laravel\Fortify\Contracts\PasswordResetResponse;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Laravel\Fortify\Fortify;

class AuthController
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function forgotPassword(Request $request): RedirectResponse
    {
        $request->validate([Fortify::email() => 'required|email']);

        $status = $this->broker()->sendResetLink(
            $request->only(Fortify::email())
        );

        return $status == Password::RESET_LINK_SENT
            ? redirect()->to('/forgot-password?modal=forgotPasswordSuccess&email=' . $request->email)
            : redirect()->to('/forgot-password?modal=forgotPasswordFailed');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            Fortify::email() => 'required|email',
            'password' => 'required',
        ]);

        $status = $this->broker()->reset(
            $request->only(Fortify::email(), 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                app(ResetsUserPasswords::class)->reset($user, $request->all());
                app(CompletePasswordReset::class)($this->guard, $user);
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->to('/login?modal=resetPasswordSuccess')
            : redirect()->to('/forgot-password?modal=resetPasswordFailed');
    }

    private function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }
}
