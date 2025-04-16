@extends("layouts.layout-2")

@section("title", $program->name . " - " . __('Тренировочные недели'))

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ $program->name . " - " . __('Тренировочные недели') }}</h1>
            <p style="color: red;">{{ session("error") }}</p>
            <div class="stream-add-wrap">
                <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
            </div>
            <div class="stream-rows stream-rows_week">
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["item" => $program->id, "week" => 1]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Первая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["item" => $program->id, "week" => 2]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Вторая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["item" => $program->id, "week" => 3]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Третья неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["item" => $program->id, "week" => 4]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Четвертая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["item" => $program->id, "week" => 5]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Пятая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["item" => $program->id, "week" => 6]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Шестая неделя') }}</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
