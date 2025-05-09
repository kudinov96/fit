<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ResultTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StreamRequest;
use App\Http\Requests\StreamUpdateRequest;
use App\Models\Program;
use App\Models\Stream;
use App\Models\User;
use App\Services\StreamService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StreamController extends Controller
{
    private static int $countWeek1 = 0;
    private static int $countWeek2 = 0;
    private static int $countWeek3 = 0;
    private static int $countWeek4 = 0;
    private static int $countWeek5 = 0;
    private static int $countWeek6 = 0;

    public function index(): Response
    {
        $streams = Stream::query()
            ->orderByDesc("start_date")
            ->get();

        $programs = Program::query()->latest()->get();

        return response()->view("stream.index", [
            "streams" => $streams,
            "programs" => $programs,
        ]);
    }

    public function view(Stream $item): Response
    {
        $users = $item->users()
            ->get()
            ->map(function ($user) {
                $results = $user->results;

                $user->has_result_week_1 = [
                    "has" => $this->countResults($user, 1),
                    "is_answered" => ($result = $results->where("type", ResultTypeEnum::WEEK_1)->first())
                        ? (bool) $result->message_admin
                        : false,
                    "user_wrote_admin_not_answered" => ($result)
                        ? ($result->message_user && !$result->message_admin)
                        : false
                ];
                $user->has_result_week_2 = [
                    "has" => $this->countResults($user, 2),
                    "is_answered" => ($result = $results->where("type", ResultTypeEnum::WEEK_2)->first())
                        ? (bool) $result->message_admin
                        : false,
                    "user_wrote_admin_not_answered" => ($result)
                        ? ($result->message_user && !$result->message_admin)
                        : false
                ];
                $user->has_result_week_3 = [
                    "has" => $this->countResults($user, 3),
                    "is_answered" => ($result = $results->where("type", ResultTypeEnum::WEEK_3)->first())
                        ? (bool) $result->message_admin
                        : false,
                    "user_wrote_admin_not_answered" => ($result)
                        ? ($result->message_user && !$result->message_admin)
                        : false
                ];
                $user->has_result_week_4 = [
                    "has" => $this->countResults($user, 4),
                    "is_answered" => ($result = $results->where("type", ResultTypeEnum::WEEK_4)->first())
                        ? (bool) $result->message_admin
                        : false,
                    "user_wrote_admin_not_answered" => ($result)
                        ? ($result->message_user && !$result->message_admin)
                        : false
                ];
                $user->has_result_week_5 = [
                    "has" => $this->countResults($user, 5),
                    "is_answered" => ($result = $results->where("type", ResultTypeEnum::WEEK_5)->first())
                        ? (bool) $result->message_admin
                        : false,
                    "user_wrote_admin_not_answered" => ($result)
                        ? ($result->message_user && !$result->message_admin)
                        : false
                ];
                $user->has_result_week_6 = [
                    "has" => $this->countResults($user, 6),
                    "is_answered" => ($result = $results->where("type", ResultTypeEnum::WEEK_6)->first())
                        ? (bool) $result->message_admin
                        : false,
                    "user_wrote_admin_not_answered" => ($result)
                        ? ($result->message_user && !$result->message_admin)
                        : false
                ];

                $user->user_wrote_admin_not_answered_any = collect([
                    $user->has_result_week_1['user_wrote_admin_not_answered'],
                    $user->has_result_week_2['user_wrote_admin_not_answered'],
                    $user->has_result_week_3['user_wrote_admin_not_answered'],
                    $user->has_result_week_4['user_wrote_admin_not_answered'],
                    $user->has_result_week_5['user_wrote_admin_not_answered'],
                    $user->has_result_week_6['user_wrote_admin_not_answered'],
                ])->contains(true);

                return $user;
            })
            ->sortByDesc(function ($user) {
                return $user->user_wrote_admin_not_answered_any;
            });

        $programs = Program::query()->latest()->get();

        return response()->view("stream.view", [
            "stream"     => $item,
            "users"      => $users,
            "programs"      => $programs,
            "countWeek1" => self::$countWeek1,
            "countWeek2" => self::$countWeek2,
            "countWeek3" => self::$countWeek3,
            "countWeek4" => self::$countWeek4,
            "countWeek5" => self::$countWeek5,
            "countWeek6" => self::$countWeek6,
        ]);
    }

    public function store(Request $request, StreamService $streamService): RedirectResponse
    {
        /*$currentStream = $streamService->currentStream();*/

        // Нельзя чтобы было одновременно 2 активных потока
        /*if ($currentStream && $currentStream->start_date->addWeeks(6) > Carbon::make($request->input("start_date"))) {
            return response()->redirectToRoute("stream.index")->with("error", "Нельзя активировать сразу 2 потока. Измените дату");
        }*/

        $streamService->store($request->all());

        return response()->redirectToRoute("stream.index");
    }

    public function update(StreamUpdateRequest $request, StreamService $streamService): RedirectResponse
    {
        /** @var Stream $stream */
        $stream = Stream::query()->find($request->stream_id);

        if ($stream) {
            $streamService->store($request->all(), $stream);
        }

        if ($request->input("from_view")) {
            return response()->redirectToRoute("stream.view", ["item" => $stream->id]);
        }

        return response()->redirectToRoute("stream.index");
    }

    public function delete(Stream $item): RedirectResponse
    {
        $item->users()->delete();
        $item->delete();

        return response()->redirectToRoute("stream.index");
    }

    /**
     * Отправил ли пользователь результат за неделю
     * Если да, увеличить счетчик
     */
    private function countResults(User $user, int $week): bool
    {
        if ($user->hasResultsByType(constant(ResultTypeEnum::class  . "::" . "WEEK_" . $week))) {
            self::${"countWeek" . $week}++;
            return true;
        }

        return false;
    }
}
