@extends("layouts.layout-2")

@section("title", __('Тренер - Добавление потока'))

@section("content")
    <div id="main-content">
        @if($streams->count() === 0)
            <div class="stream-intro container">
                <h1>{{ __('потоки марафона') }}</h1>
                <p>{{ __('У вас пока нет ни одного потока. Вы можете его создать.') }}</p>
                <p><a data-bs-toggle="modal" data-bs-target="#newModal" class="btn">{{ __('+ Создать поток') }}</a></p>
                <p><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></p>
                <p><a href="{{ route("mealPlan.index") }}" class="btn">{{ __('Планы питания') }}</a></p>
            </div>
        @else
            <div class="container">
                <h1 class="stream-title">{{ __('потоки марафона') }}</h1>
                <p style="color: red;">{{ session("error") }}</p>
                <div class="stream-add-wrap">
                    <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
                    <div class="stream-add"><a href="{{ route("mealPlan.index") }}" class="btn">{{ __('Планы питания') }}</a></div>
                    <div class="stream-add"><a data-bs-toggle="modal" data-bs-target="#newModal" class="btn">{{ __('+ Создать поток') }}</a></div>
                </div>
                <div class="stream-rows">
                    @foreach($streams as $stream)
                        <div class="stream-item">
                            <a href="{{ route("stream.view", ["item" => $stream]) }}" @class([
                                "stream-row",
                                "stream-row_wait" => $stream->status === __("ждет старта"),
                                "stream-row_started" => $stream->status === __("активный"),
                                "stream-row_completed" => $stream->status === __("завершен"),
                            ])>
                                <div class="sr-meta">
                                    <div>ID {{ $stream->id }}</div>
                                    <div>{{ $stream->title ? $stream->title . " -" : __('Поток от') }} {{ $stream->start_date->format("d.m.y") }}<span> ({{ $stream->status }})</span></div>
                                </div>
                            </a>

                            {{--@if($stream->status === __("ждет старта"))--}}
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
                                            <a class="dropdown-item update-stream-modal"
                                               data-id="{{ $stream->id }}"
                                               data-title="{{ $stream->title }}"
                                               data-date="{{ $stream->start_date->format("Y-m-d") }}"
                                               data-chat="{{ $stream->group_chat }}"
                                               data-program="{{ $stream->program_id }}"
                                               data-template-for-start="{{ \Storage::url($stream->template_for_start) }}"
                                               data-template-for-finish="{{ \Storage::url($stream->template_for_finish) }}"
                                               data-template-info-book-lv="{{ \Storage::url($stream->template_info_book_lv) }}"
                                               data-template-info-book-en="{{ \Storage::url($stream->template_info_book_en) }}"
                                               data-template-info-book-ru="{{ \Storage::url($stream->template_info_book_ru) }}"
                                               data-template-recipe-book-lv="{{ \Storage::url($stream->template_recipe_book_lv) }}"
                                               data-template-recipe-book-en="{{ \Storage::url($stream->template_recipe_book_en) }}"
                                               data-template-recipe-book-ru="{{ \Storage::url($stream->template_recipe_book_ru) }}"
                                               data-template-access-to-gym="{{ $stream->access_to_gym }}"
                                               data-template-access-to-home="{{ $stream->access_to_home }}"
                                               data-template-access-to-meal-plan="{{ $stream->access_to_meal_plan }}"
                                               data-template-access-to-results="{{ $stream->access_to_results }}"
                                               data-template-access-to-check-in="{{ $stream->access_to_check_in }}"
                                               data-bs-toggle="modal" data-bs-target="#editModal">{{ __('Редактировать') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            {{--@endif--}}
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
                    <form {{--class="needs-validation"--}} action="{{ route("stream.store") }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("POST")

                        <div class="form-item">
                            <label>{{ __('Название потока') }}</label>
                            <input name="title" type="text" value="" class="form-control">
                        </div>

                        <div class="form-item">
                            <label>{{ __('Дата старта') }}</label>
                            <input name="start_date" type="date" value="" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label>{{ __('Групповой чат') }}</label>
                            <input name="group_chat" type="text" value="" class="form-control">
                        </div>
                        <div class="form-item">
                            <label>{{ __('Программа') }}</label>
                            <select name="program_id" class="form-control form-select" required>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }} (ID {{ $program->id }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Загрузить шаблон листа для старта') }}</label>
                            <input class="file-upload" name="template_for_start" type="file">
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Загрузить шаблон листа для финиша') }}</label>
                            <input class="file-upload" name="template_for_finish" type="file">
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Инфобук') }} LV</label>
                            <input class="file-upload" name="template_info_book_lv" type="file">
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Инфобук') }} EN</label>
                            <input class="file-upload" name="template_info_book_en" type="file">
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Инфобук') }} RU</label>
                            <input class="file-upload" name="template_info_book_ru" type="file">
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Книга рецептов') }} LV</label>
                            <input class="file-upload" name="template_recipe_book_lv" type="file">
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Книга рецептов') }} EN</label>
                            <input class="file-upload" name="template_recipe_book_en" type="file">
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Книга рецептов') }} RU</label>
                            <input class="file-upload" name="template_recipe_book_ru" type="file">
                        </div>
                        <div class="form-item form-checkbox">
                            <label for="access_to_gym" class="control-label">{{ __('Доступ к Тренировкам в зале') }}</label>
                            <input id="access_to_gym" name="access_to_gym" type="checkbox" value="0">
                        </div>
                        <div class="form-item form-checkbox">
                            <label for="access_to_home" class="control-label">{{ __('Доступ к Тренировкам дома') }}</label>
                            <input id="access_to_home" name="access_to_home" type="checkbox" value="0">
                        </div>
                        <div class="form-item form-checkbox">
                            <label for="access_to_meal_plan" class="control-label">{{ __('Генерация Плана питания') }}</label>
                            <input id="access_to_meal_plan" name="access_to_meal_plan" type="checkbox" value="0">
                        </div>
                        <div class="form-item form-checkbox">
                            <label for="access_to_results" class="control-label">{{ __('Раздел “Мои результаты”') }}</label>
                            <input id="access_to_results" name="access_to_results" type="checkbox" value="0">
                        </div>
                        <div class="form-item form-checkbox">
                            <label for="access_to_check_in" class="control-label">{{ __('Раздел “Check In”') }}</label>
                            <input id="access_to_check_in" name="access_to_check_in" type="checkbox" value="0">
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('Создать') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-stream-modal-edit :programs="$programs" :fromView="false"></x-stream-modal-edit>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $('.file-upload').fileinput({
                showCaption: false,
                hideThumbnailContent: false,
                dropZoneEnabled: false,
                showPreview: true,
                showUploadedThumbs: true,
                showUpload: false,
                showZoom: false,
                browseLabel: '{{ __("Загрузить") }}',
                browseClass: 'btn btn-green',
                removeLabel: '{{ __("Удалить") }}',
                removeClass: 'd-none'
            });
        });
    </script>
@endsection
