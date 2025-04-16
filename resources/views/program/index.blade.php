@extends("layouts.layout-2")

@section("title", __('Тренер - Добавление программы'))

@section("content")
    <div id="main-content">
        @if($programs->count() === 0)
            <div class="stream-intro container">
                <h1>{{ __('программы марафона') }}</h1>
                <p>{{ __('У вас пока нет ни одной программы. Вы можете её создать.') }}</p>
                <p><a data-bs-toggle="modal" data-bs-target="#newModal" class="btn">{{ __('+ Создать программу') }}</a></p>
            </div>
        @else
            <div class="container">
                <h1 class="stream-title">{{ __('программы марафона') }}</h1>
                <p style="color: red;">{{ session("error") }}</p>
                <div class="stream-add-wrap">
                    <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                    <div class="stream-add"><a data-bs-toggle="modal" data-bs-target="#newModal" class="btn">{{ __('+ Создать программу') }}</a></div>
                </div>
                <div class="stream-rows">
                    @foreach($programs as $program)
                        <div class="stream-item">
                            <a href="{{ route("program.view", ["item" => $program]) }}" class="stream-row stream-row_program">
                                <div class="sr-meta">
                                    <div>ID {{ $program->id }}</div>
                                    <div>{{ $program->name }}</div>
                                </div>
                            </a>

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
                                        <a class="dropdown-item update-program-modal" data-id="{{ $program->id }}" data-bs-toggle="modal" data-bs-target="#editModal">{{ __('Редактировать') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- new program modal  -->
    <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Создать программу') }}</div>
                    <form class="needs-validation" action="{{ route("program.store") }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("POST")
                        <div class="form-item">
                            <input type="hidden" name="stream_id">

                            <label>{{ __('Название') }}</label>
                            <input name="name" type="text" class="form-control mb-2" required>
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
                    <div class="modal-title">{{ __('Редактировать программу') }} <span></span></div>
                    <form class="needs-validation" action="{{ route("program.update") }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("PUT")

                        <input type="hidden" name="program_id">

                        <div class="form-item">
                            <label>{{ __('Название') }}</label>
                            <input name="name" type="text" class="form-control mb-2" required>
                        </div>

                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('Обновить') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
