@extends("layouts.layout-2")

@section("title", __('Тренировочные недели - Неделя'))

@section("styles")
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ __('Неделя') }} - {{ $week }}</h1>
            <p style="color: red;">{{ session("error") }}</p>
            <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
            <div class="stream-add" style="margin-top: 0;"><a href="{{ route("training.index") }}" class="btn">{{ __('К неделям') }}</a></div>
            <div class="stream-add" style="margin-top: 0;"><a href="{{ route("training.index.create", ["week" => $week]) }}" class="btn">{{ __('+ Создать тренировку') }}</a></div>
            <div class="stream-rows stream-rows_training">
                @foreach($trainings as $training)
                    <div class="stream-item">
                        <a href="{{ route("training.index.edit", ["training" => $training]) }}" @class(["stream-row"])>
                            <div class="sr-meta">
                                <div>{{ $training->title }} <span>({{ __('День') }} {{ $training->day }}, {{ $training->where }})</span></div>
                            </div>
                        </a>
                    </div>
                @endforeach
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

            var form = document.querySelector('#createForm');
            form.onsubmit = function(e) {
                editors.forEach(function(editor, index) {
                    var quill = new Quill(editor);
                    var hiddenArea = document.querySelectorAll('.hiddenArea')[index];
                    hiddenArea.value = quill.root.innerHTML;
                });
            };

            var form2 = document.querySelector('#editForm');
            form2.onsubmit = function(e) {
                editors.forEach(function(editor, index) {
                    var quill = new Quill(editor);
                    var hiddenArea = document.querySelectorAll('.hiddenArea')[index];
                    hiddenArea.value = quill.root.innerHTML;
                });
            };
        });
    </script>

@endsection
