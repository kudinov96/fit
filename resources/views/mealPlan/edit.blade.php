@extends("layouts.layout-2")

@section("title", __('Редактировать план питания') . " - " . $item->title)

@section("styles")
    {{--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
@endsection

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ __('Редактировать план питания') . " - " . $item->title }}
            </h1>
            <p style="color: red;">{{ session("errors") }}</p>
            <div class="stream-add-wrap">
                <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
                <div class="stream-add"><a href="{{ route("mealPlan.index") }}" class="btn">{{ __('Планы питания') }}</a></div>
            </div>

            <div class="form-action">
                <form class="needs-validation" onSubmit="if(!confirm('{{ __("Вы действительно хотите удалить этот план?") }}')){return false;}" action="{{ route("mealPlan.delete", ["item" => $item]) }}" method="POST" novalidate>
                    @csrf
                    @method("DELETE")

                    <div>
                        <button type="submit" class="btn btn_red">{{ __('Удалить') }}</button>
                    </div>
                </form>
            </div>

            <form id="createForm" action="{{ route("mealPlan.update", ["item" => $item]) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method("PUT")

                <div class="form-item">
                    <label>{{ __('Название') }}</label>
                    <input name="title_ru" value="{{ $item->title_ru }}" type="text" placeholder="ru" class="form-control mb-2" required>
                    <input name="title_lv" value="{{ $item->title_lv }}" type="text" placeholder="lv" class="form-control mb-2" required>
                    <input name="title_en" value="{{ $item->title_en }}" type="text" placeholder="en" class="form-control" required>
                </div>

                <div class="form-item">
                    <label>{{ __("Цель") }}</label><br>
                    <select name="target_type" class="form-control select2" required>
                        <option value="loss" @if($item->target_type === "loss") selected @endif>{{ __("Похудение") }}</option>
                        <option value="support" @if($item->target_type === "support") selected @endif>{{ __("Поддержание") }}</option>
                        <option value="gain" @if($item->target_type === "gain") selected @endif>{{ __("Набор") }}</option>
                    </select>
                </div>

                <div class="form-item">
                    <label>{{ __("Тип меню") }}</label><br>
                    <select name="menu_type" class="form-control select2" required>
                        <option value="classic" @if($item->menu_type === "classic") selected @endif>Classic</option>
                        <option value="GF" @if($item->menu_type === "GF") selected @endif>GF</option>
                        <option value="LF" @if($item->menu_type === "LF") selected @endif>LF</option>
                        <option value="vegetarian" @if($item->menu_type === "vegetarian") selected @endif>LF</option>
                        <option value="vegan" @if($item->menu_type === "vegan") selected @endif>Vegan</option>
                    </select>
                </div>

                <div class="form-item">
                    <label>{{ __("Рост") }}</label>
                    <input name="height_from" value="{{ $item->height_from }}" type="number" placeholder="{{ __("от") }}" class="form-control mb-2" required>
                    <input name="height_to" value="{{ $item->height_to }}" type="number" placeholder="{{ __("до") }}" class="form-control" required>
                </div>

                <div class="form-item">
                    <label>{{ __("Вес") }}</label>
                    <input name="weight_from" value="{{ $item->weight_from }}" type="number" placeholder="{{ __("от") }}" class="form-control mb-2" required>
                    <input name="weight_to" value="{{ $item->weight_to }}" type="number" placeholder="{{ __("до") }}" class="form-control" required>
                </div>

                <div class="form-file form-item">
                    <label class="control-label">
                        {{ __('Файл') . " RU" }}
                        @if($item->file_ru)
                            <a style="color: #fff;" href="{{ \Storage::url($item->file_ru) }}" target="_blank">{{ __('Превью') }}</a>
                        @endif
                    </label>
                    <input class="file-upload" name="file_ru" type="file" required>
                </div>

                <div class="form-file form-item">
                    <label class="control-label">
                        {{ __('Файл') . " LV" }}
                        @if($item->file_lv)
                            <a style="color: #fff;" href="{{ \Storage::url($item->file_lv) }}" target="_blank">{{ __('Превью') }}</a>
                        @endif
                    </label>
                    <input class="file-upload" name="file_lv" type="file" required>
                </div>

                <div class="form-file form-item">
                    <label class="control-label">
                        {{ __('Файл') . " EN" }}
                        @if($item->file_en)
                            <a style="color: #fff;" href="{{ \Storage::url($item->file_en) }}" target="_blank">{{ __('Превью') }}</a>
                        @endif
                    </label>
                    <input class="file-upload" name="file_en" type="file" required>
                </div>

                <div class="form-action mb-4">
                    <button type="submit" class="btn" style="margin-left: 15px;">{{ __('Сохранить') }}</button>
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
