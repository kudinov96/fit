<?php

namespace App\Services;

use App\Models\Stream;
use App\Models\User;

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
     * Получить номер текущей недели потока
     */
    public function currentWeekStream(Stream $stream): int
    {
        return $stream->start_date->diffInWeeks(now()) + 1;
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

    /**
     * Получить дни с датами по неделям
     */
    public function daysWithDateByWeek(Stream $stream, int $week, User $user): array
    {
        $result = [];
        for ($i = 1; $i <= 7; $i++) {
            $date = $stream->start_date->addWeeks($week - 1)->addDays($i - 1);
            $result[$i]["date"]  = __($date->format("D")) . ", " . $date->format("d.m.y");
            $result[$i]["item"] = $user->checkIn()
                ->where("week", $week)
                ->where("day", $i)
                ->first();
        }

        return $result;
    }
}
