<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (ValidationException $e, $request) {
            if ($request->is('login') || $request->is('login/*')) {
                return (new CustomLoginExceptionHandler)->handle($request, $e);
            }
        });

        $this->renderable(function (MarathonStartException $e, $request) {
            if ($request->is('login') || $request->is('login/*')) {
                return (new CustomLoginExceptionHandler)->handleMarathonStart($request, $e);
            }
        });
    }
}
