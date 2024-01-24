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

    /**
     * Создать/обновить поток
     */
    public function store(array $data, ?Stream $stream = null): Stream
    {
        $stream = $stream ?? new Stream();
        $stream->start_date = $data["start_date"];

        if (isset($data["template_for_start"])) {
            $stream->template_for_start = $data["template_for_start"]->store("public/streams");
        }

        if (isset($data["template_for_finish"])) {
            $stream->template_for_finish = $data["template_for_finish"]->store("public/streams");
        }

        $stream->save();

        return $stream;
    }
}
