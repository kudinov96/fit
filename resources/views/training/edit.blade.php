@extends("layouts.layout-2")

@section("title", __('Изменить тренировку'))

@section("styles")
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ __('Изменить тренировку') . ' - ' . $training->title }}</h1>
            <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
            <div class="stream-add" style="margin-top: 0;"><a href="{{ route("training.index") }}" class="btn">{{ __('К неделям') }}</a></div>

            <form id="editForm" class="needs-validation" action="{{ route("training.update", ["training" => $training]) }}" method="POST" novalidate>
                @csrf
                @method("PUT")

                <div class="form-item">
                    <label>{{ __('Заголовок') }}</label>
                    <input name="title_ru" value="{{ $training->title_ru }}" type="text" placeholder="ru" class="form-control mb-2" required>
                    <input name="title_lv" value="{{ $training->title_lv }}" type="text" placeholder="lv" class="form-control mb-2" required>
                    <input name="title_en" value="{{ $training->title_en }}" type="text" placeholder="en" class="form-control" required>
                </div>

                <div class="form-item">
                    <label>{{ __('Описание') }}</label>
                    <textarea name="description_ru" placeholder="ru" class="form-control mb-2" required>{{ $training->description_ru }}</textarea>
                    <textarea name="description_lv" placeholder="lv" class="form-control mb-2" required>{{ $training->description_lv }}</textarea>
                    <textarea name="description_en" placeholder="en" class="form-control mb-2" required>{{ $training->description_en }}</textarea>
                </div>

                <div class="form-item">
                    <label>{{ __('Контент') }}</label>

                    <p class="mb-1" style="font-weight: 600">ru</p>
                    <div class="editor mb-2">{!! $training->content_ru !!}</div>
                    <textarea name="content_ru" placeholder="ru" class="hiddenArea" required></textarea>

                    <p class="mb-1" style="font-weight: 600">lv</p>
                    <div class="editor mb-2">{!! $training->content_lv !!}</div>
                    <textarea name="content_lv" placeholder="lv" class="hiddenArea" required></textarea>

                    <p class="mb-1" style="font-weight: 600">en</p>
                    <div class="editor">{!! $training->content_en !!}</div>
                    <textarea name="content_en" placeholder="en" class="hiddenArea" required></textarea>
                </div>

                <div class="form-item">
                    <label>{{ __('ID YouTube видео') }}</label>
                    <input name="yt_video_id" type="text" value="{{ $training->yt_video_id }}" class="form-control" required>
                </div>

                <div class="form-item">
                    <label>{{ __('Неделя тренировки') }}</label>
                    <select name="weeks[]" class="form-control select2" multiple required>
                        <option value="1" @if(in_array(1, $training->weeks)) selected @endif>1</option>
                        <option value="2" @if(in_array(2, $training->weeks)) selected @endif>2</option>
                        <option value="3" @if(in_array(3, $training->weeks)) selected @endif>3</option>
                        <option value="4" @if(in_array(4, $training->weeks)) selected @endif>4</option>
                        <option value="5" @if(in_array(5, $training->weeks)) selected @endif>5</option>
                        <option value="6" @if(in_array(6, $training->weeks)) selected @endif>6</option>
                    </select>
                </div>

                <div class="form-item">
                    <label>{{ __('День тренировки') }}</label>
                    <select name="day" class="form-control" required>
                        <option value="1" @if($training->day === 1) selected @endif>1</option>
                        <option value="2" @if($training->day === 2) selected @endif>2</option>
                        <option value="3" @if($training->day === 3) selected @endif>3</option>
                        <option value="4" @if($training->day === 4) selected @endif>4</option>
                        <option value="5" @if($training->day === 5) selected @endif>5</option>
                    </select>
                </div>

                <div class="form-item">
                    <label>{{ __('Где проходит тренировка') }}</label>
                    <select name="where" class="form-control" required>
                        @foreach($trainingWhere as $where)
                            <option value="{{ $where->value }}" @if($training->where === $where) selected @endif>{{ $where->value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-item">
                    <label>{{ __('Позиция') }}</label>
                    <input name="position" value="{{ $training->position }}" type="number" class="form-control">
                </div>

                <div class="form-action">
                    <button type="submit" class="btn">{{ __('Обновить') }}</button>
                </div>
            </form>

            <form class="needs-validation mt-4" onSubmit="if(!confirm('{{ __("Вы действительно хотите удалить эту тренировку?") }}')){return false;}" action="{{ route("training.delete", ["training" => $training]) }}" method="POST" novalidate>
                @csrf
                @method("DELETE")

                <div>
                    <button type="submit" class="btn btn_red">{{ __('Удалить') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toolbarOptions = [
                ['bold'],
            ];

            var editors = document.querySelectorAll('.editor');

            editors.forEach(function(editor, index) {
                var quill = new Quill(editor, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });

                var hiddenArea = document.querySelectorAll('.hiddenArea')[index];

                quill.on('text-change', function() {
                    hiddenArea.value = quill.root.innerHTML;
                });
            });

            var form = document.querySelector('#editForm');
            form.onsubmit = function(e) {
                editors.forEach(function(editor, index) {
                    var quill = new Quill(editor);
                    var hiddenArea = document.querySelectorAll('.hiddenArea')[index];
                    hiddenArea.value = quill.root.innerHTML;
                });
            };
        });
    </script>

@endsection
