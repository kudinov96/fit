<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class CustomLoginExceptionHandler
{
    public function handle($request, ValidationException $exception)
    {
        if ($request->is('login') || $request->is('login/*')) {
            return redirect()->to('/login?modal=loginFailed');
        }

        throw $exception;
    }
}
