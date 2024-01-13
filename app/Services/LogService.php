<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Throwable;

class LogService
{
    public function error(string $message, Throwable $e): void
    {
        Log::error($message, [
            "message" => $e->getMessage(),
            "file" => $e->getFile(),
            "line" => $e->getLine(),
        ]);
    }
}
