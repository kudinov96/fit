<?php

namespace App\Services;

use App\Enums\ResultTypeEnum;
use App\Models\Result;
use App\Models\Stream;
use App\Models\User;
use App\Notifications\AnswerAdminNotify;
use Illuminate\Support\Collection;

/**
 * Сервис обработки результатов пользователей
 */
class ResultService
{
    private StreamService $streamService;

    public function __construct(StreamService $streamService)
    {
        $this->streamService = $streamService;
    }

    public function store(array $data, User $currentUser): Result
    {
        $result = new Result();
        $result->user_id = $currentUser->id;
        $result->stream_id = $currentUser->stream_id;
        $result->type = $data["type"];
        $result->weight = $data["weight"];
        $result->breast = $data["breast"];
        $result->waistline = $data["waistline"];
        $result->hips = $data["hips"];
        $result->hand = $data["hand"];
        $result->leg = $data["leg"];

        if (isset($data["photo_1"])) {
            $result->photo_1 = $data["photo_1"]->store("public/results");
        }

        if (isset($data["photo_2"])) {
            $result->photo_2 = $data["photo_2"]->store("public/results");
        }

        if (isset($data["photo_3"])) {
            $result->photo_3 = $data["photo_3"]->store("public/results");
        }

        if (isset($data["message_user"])) {
            $result->message_user = $data["message_user"];
            $result->message_user_date = now();
        }

        $result->save();

        return $result;
    }

    public function updatePhoto(array $data, User $currentUser): Result
    {
        $type   = $data["type"];
        $number = $data["number"];
        $photo  = $data["photo"]->store("public/results");

        /** @var Result $result */
        $result = Result::query()
            ->where("user_id", $currentUser->id)
            ->where("stream_id", $currentUser->stream_id)
            ->where("type", $type)
            ->first();

        $result->{"photo_" . $number} = $photo;

        $result->save();

        return $result;
    }

    /**
     * Ответ администратора на результат
     */
    public function answerAdmin(Result $result, User $user, string $message): Result
    {
        $result->message_admin = $message;
        $result->message_admin_date = now();

        $result->save();

        $user->notify((new AnswerAdminNotify($user, $message))->locale($user->language));

        return $result;
    }

    public function weeksWithResults(User $user): Collection
    {
        $currentWeek = $this->streamService->currentWeekStream($user->stream);

        $weeks = new Collection();
        for ($week = 1; $week <= 6; $week++) {
            $weekItem = new Collection();

            $weekItem->put("number", $week);
            $weekItem->put("isCurrent", $week === $currentWeek);
            $weekItem->put("result", $user->results()
                ->where("stream_id", $user->stream_id)
                ->where("type", constant(ResultTypeEnum::class . "::" . "WEEK_" . $week))
                ->first());
            $weekItem->put("nowMoreFriday", now() >= $user->stream->start_date->addWeeks($week - 1)->addDays(5));

            $weekItem->put("days", $this->streamService->daysWithDateByWeek($user->stream, $week, $user));

            $weeks->put("week" . $week, $weekItem);
        }

        return $weeks;
    }
}
