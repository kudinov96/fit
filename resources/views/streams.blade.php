@extends("layouts.layout-2")

@section("title", __('Тренер - Добавление потока'))

@section("content")
    <div id="main-content">
        @if($streams->count() === 0)
            <div class="stream-intro container">
                <h1>{{ __('потоки марафона') }}</h1>
                <p>{{ __('У вас пока нет ни одного потока. Вы можете его создать.') }}</p>
                <p><a data-bs-toggle="modal" data-bs-target="#newModal" class="btn">{{ __('+ Создать поток') }}</a></p>
                <p><a href="{{ route("training.index") }}" class="btn">{{ __('Тренировки') }}</a></p>
            </div>
        @else
            <div class="container">
                <h1 class="stream-title">{{ __('потоки марафона') }}</h1>
                <p style="color: red;">{{ session("error") }}</p>
                <div class="stream-add"><a href="{{ route("training.index") }}" class="btn">{{ __('Тренировки') }}</a></div>
                <div class="stream-add" style="margin-top: 0;"><a data-bs-toggle="modal" data-bs-target="#newModal" class="btn">{{ __('+ Создать поток') }}</a></div>
                <div class="stream-rows">
                    @foreach($streams as $stream)
                        <div class="stream-item">
                            <a href="#" @class([
                                "stream-row",
                                "stream-row_wait" => $stream->status === __("ждет старта"),
                                "stream-row_started" => $stream->status === __("активный"),
                                "stream-row_completed" => $stream->status === __("завершен"),
                            ])>
                                <div class="sr-meta">
                                    <div>ID {{ $stream->id }}</div>
                                    <div>{{ __('Поток от') }} {{ $stream->start_date->format("d.m.y") }}<span> ({{ $stream->status }})</span></div>
                                </div>
                            </a>

                            @if($stream->status === __("ждет старта"))
                                <div class="form-item dropdown">
                                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg width="7" height="31" viewBox="0 0 7 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="white"></circle>
                                            <circle cx="3.5" cy="15.5" r="3.5" fill="white"></circle>
                                            <circle cx="3.5" cy="27.5" r="3.5" fill="white"></circle>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item update-stream-modal" data-id="{{ $stream->id }}" data-bs-toggle="modal" data-bs-target="#editModal">{{ __('Редактировать') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- new stream modal  -->
    <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Создать поток') }}</div>
                    <form class="needs-validation" action="{{ route("stream.store") }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("POST")

                        <div class="form-item">
                            <label>{{ __('Дата старта') }}</label>
                            <input name="start_date" type="date" value="" class="form-control" required>
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Загрузить шаблон листа для старта') }}</label>
                            <input id="file-1" name="template_for_start" type="file" required>
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Загрузить шаблон листа для финиша') }}</label>
                            <input id="file-2" name="template_for_finish" type="file" required>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('Создать') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit stream modal  -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Редактировать поток') }} <span></span></div>
                    <form class="needs-validation" action="{{ route("stream.update") }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("PUT")

                        <input type="hidden" name="stream_id">

                        <div class="form-item">
                            <label>{{ __('Дата старта') }}</label>
                            <input name="start_date" type="date" value="" class="form-control" required>
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Загрузить шаблон листа для старта') }}</label>
                            <input id="file-1" name="template_for_start" type="file" required>
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Загрузить шаблон листа для финиша') }}</label>
                            <input id="file-2" name="template_for_finish" type="file" required>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('Редактировать') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
