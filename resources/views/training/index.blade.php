@extends("layouts.layout-2")

@section("title", __('Тренировочные недели'))

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ __('Тренировочные недели') }}</h1>
            <p style="color: red;">{{ session("error") }}</p>
            <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
            <div class="stream-rows stream-rows_week">
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["week" => 1]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Первая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["week" => 2]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Вторая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["week" => 3]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Третья неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["week" => 4]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Четвертая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["week" => 5]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Пятая неделя') }}</div>
                        </div>
                    </a>
                </div>
                <div class="stream-item">
                    <a href="{{ route("training.index.week", ["week" => 6]) }}" @class(["stream-row"])>
                        <div class="sr-meta">
                            <div>{{ __('Шестая неделя') }}</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
