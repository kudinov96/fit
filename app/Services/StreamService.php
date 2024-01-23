<?php

namespace App\Services;

use App\Models\Stream;

class StreamService
{
    private Stream $stream;

    public function __construct(Stream $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Получить текущий поток
     */
    public function currentStream(): ?Stream
    {
        $nowDate = now();
        $sixWeeksAgo = now()->subWeeks(6);

        /** @var Stream|null $currentStream */
        $currentStream = $this->stream->newQuery()
            ->whereDate("start_date", ">=", $sixWeeksAgo)
            ->whereDate("start_date", "<=", $nowDate)
            ->first();

        return $currentStream;
    }
}
