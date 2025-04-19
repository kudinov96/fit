@props(["programs", "fromView"])

<!-- edit stream modal  -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-title">{{ __('Редактировать поток') }} <span></span></div>
                <form {{--class="needs-validation"--}} action="{{ route("stream.update") }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method("PUT")

                    @if ($fromView)
                        <input type="hidden" name="from_view" value="true">
                    @endif

                    <input type="hidden" name="stream_id">

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
                        <label class="control-label"><a id="template-for-start" target="_blank">{{ __('Загрузить шаблон листа для старта') }}</a></label>
                        <input class="file-upload" name="template_for_start" type="file" required>
                    </div>
                    <div class="form-file form-item">
                        <label class="control-label"><a id="template-for-finish" target="_blank">{{ __('Загрузить шаблон листа для финиша') }}</a></label>
                        <input class="file-upload" name="template_for_finish" type="file" required>
                    </div>
                    <div class="form-file form-item">
                        <label class="control-label"><a id="template-info-book-lv" target="_blank">{{ __('Инфобук') }} LV</a></label>
                        <input class="file-upload" name="template_info_book_lv" type="file" required>
                    </div>
                    <div class="form-file form-item">
                        <label class="control-label"><a id="template-info-book-en" target="_blank">{{ __('Инфобук') }} EN</a></label>
                        <input class="file-upload" name="template_info_book_en" type="file" required>
                    </div>
                    <div class="form-file form-item">
                        <label class="control-label"><a id="template-info-book-ru" target="_blank">{{ __('Инфобук') }} RU</a></label>
                        <input class="file-upload" name="template_info_book_ru" type="file" required>
                    </div>
                    <div class="form-file form-item">
                        <label class="control-label"><a id="template-recipe-book-lv" target="_blank">{{ __('Книга рецептов') }} LV</a></label>
                        <input class="file-upload" name="template_recipe_book_lv" type="file">
                    </div>
                    <div class="form-file form-item">
                        <label class="control-label"><a id="template-recipe-book-en" target="_blank">{{ __('Книга рецептов') }} EN</a></label>
                        <input class="file-upload" name="template_recipe_book_en" type="file">
                    </div>
                    <div class="form-file form-item">
                        <label class="control-label"><a id="template-recipe-book-ru" target="_blank">{{ __('Книга рецептов') }} RU</a></label>
                        <input class="file-upload" name="template_recipe_book_ru" type="file">
                    </div>
                    <div class="form-item form-checkbox">
                        <label for="access_to_gym" class="control-label">{{ __('Доступ к Тренировкам в зале') }}</label>
                        <input type="hidden" name="access_to_gym" value="0">
                        <input id="access_to_gym" name="access_to_gym" type="checkbox" value="1">
                    </div>
                    <div class="form-item form-checkbox">
                        <label for="access_to_home" class="control-label">{{ __('Доступ к Тренировкам дома') }}</label>
                        <input type="hidden" name="access_to_home" value="0">
                        <input id="access_to_home" name="access_to_home" type="checkbox" value="1">
                    </div>
                    <div class="form-item form-checkbox">
                        <label for="access_to_meal_plan" class="control-label">{{ __('Генерация Плана питания') }}</label>
                        <input type="hidden" name="access_to_meal_plan" value="0">
                        <input id="access_to_meal_plan" name="access_to_meal_plan" type="checkbox" value="1">
                    </div>
                    <div class="form-item form-checkbox">
                        <label for="access_to_results" class="control-label">{{ __('Раздел “Мои результаты”') }}</label>
                        <input type="hidden" name="access_to_results" value="0">
                        <input id="access_to_results" name="access_to_results" type="checkbox" value="1">
                    </div>
                    <div class="form-item form-checkbox">
                        <label for="access_to_check_in" class="control-label">{{ __('Раздел “Check In”') }}</label>
                        <input type="hidden" name="access_to_check_in" value="0">
                        <input id="access_to_check_in" name="access_to_check_in" type="checkbox" value="1">
                    </div>
                    <div class="form-action">
                        <button type="submit" class="btn">{{ __('Редактировать') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
