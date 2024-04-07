<?php

namespace App\Exceptions;

use Carbon\Carbon;
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

    public function handleMarathonStart($request, MarathonStartException $exception)
    {
        if ($request->is('login') || $request->is('login/*')) {
            return redirect()->to('/login?modal=marathonStartFailed&marathonStart=' . $exception->getMessage());
        }

        throw $exception;
    }
}
