@extends("layouts.layout-2")

@section("title", __('Создать план питания'))

@section("styles")
    {{--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
@endsection

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ __('Создать план питания') }}
            </h1>
            <p style="color: red;">{{ session("errors") }}</p>
            <div class="stream-add-wrap">
                <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
                <div class="stream-add"><a href="{{ route("mealPlan.index") }}" class="btn">{{ __('Планы питания') }}</a></div>
            </div>
            <form id="createForm" {{-- class="needs-validation"--}} action="{{ route("mealPlan.store") }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method("POST")

                <div class="form-item">
                    <label>{{ __('Название') }}</label>
                    <input name="title_ru" type="text" placeholder="ru" class="form-control mb-2" required>
                    <input name="title_lv" type="text" placeholder="lv" class="form-control mb-2" required>
                    <input name="title_en" type="text" placeholder="en" class="form-control" required>
                </div>

                <div class="form-item">
                    <label>{{ __("Цель") }}</label>
                    <select name="target_type" class="form-control select2" required>
                        <option value="loss">{{ __("Похудение") }}</option>
                        <option value="support">{{ __("Поддержание") }}</option>
                        <option value="gain">{{ __("Набор") }}</option>
                    </select>
                </div>

                <div class="form-item">
                    <label>{{ __("Тип меню") }}</label>
                    <select name="menu_type" class="form-control select2" required>
                        <option value="classic">Classic</option>
                        <option value="GF">GF</option>
                        <option value="LF">LF</option>
                        <option value="vegetarian">Vegetarian</option>
                        <option value="vegan">Vegan</option>
                    </select>
                </div>

                <div class="form-item">
                    <label>{{ __("Рост") }}</label>
                    <input name="height_from" type="number" placeholder="{{ __("от") }}" class="form-control mb-2" required>
                    <input name="height_to" type="number" placeholder="{{ __("до") }}" class="form-control" required>
                </div>

                <div class="form-item">
                    <label>{{ __("Вес") }}</label>
                    <input name="weight_from" type="number" placeholder="{{ __("от") }}" class="form-control mb-2" required>
                    <input name="weight_to" type="number" placeholder="{{ __("до") }}" class="form-control" required>
                </div>

                <div class="form-file form-item">
                    <label class="control-label">{{ __('Файл') . " RU" }}</label>
                    <input class="file-upload" name="file_ru" type="file" required>
                </div>

                <div class="form-file form-item">
                    <label class="control-label">{{ __('Файл') . " LV" }}</label>
                    <input class="file-upload" name="file_lv" type="file" required>
                </div>

                <div class="form-file form-item">
                    <label class="control-label">{{ __('Файл') . " EN" }}</label>
                    <input class="file-upload" name="file_en" type="file" required>
                </div>

                <div class="form-action">
                    <button type="submit" class="btn">{{ __('Создать') }}</button>
                </div>
            </form>
        </div>
    </div>
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
