<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StreamRequest;
use App\Http\Requests\StreamUpdateRequest;
use App\Models\Stream;
use App\Services\StreamService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class StreamController extends Controller
{
    public function index(): Response
    {
        $streams = Stream::query()
            ->orderByDesc("start_date")
            ->get();

        return response()->view("streams", [
            "streams" => $streams,
        ]);
    }

    public function store(StreamRequest $request, StreamService $streamService): RedirectResponse
    {
        $currentStream = $streamService->currentStream();

        // Нельзя чтобы было одновременно 2 активных потока
        if ($currentStream && $currentStream->start_date->addWeeks(6) > Carbon::make($request->input("start_date"))) {
            return response()->redirectToRoute("stream.index")->with("error", "Нельзя активировать сразу 2 потока. Измените дату");
        }

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

        return response()->redirectToRoute("stream.index");
    }
}
