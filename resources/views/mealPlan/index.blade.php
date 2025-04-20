@extends("layouts.layout-2")

@section("title", __("Планы питания"))

@section("styles")
    {{--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
@endsection

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ __("Планы питания") }}</h1>
            <p style="color: red;">{{ session("error") }}</p>
            <div class="stream-add-wrap">
                <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
                <div class="stream-add"><a href="{{ route("mealPlan.configurator") }}" class="btn">{{ __('Конфигуратор') }}</a></div>
                <div class="stream-add"><a href="{{ route("mealPlan.create") }}" class="btn">{{ __('+ Создать план питания') }}</a></div>
            </div>
            <div class="stream-rows stream-rows_training">
                @foreach($items as $item)
                    <div class="stream-item">
                        <div @class(["stream-row"])>
                            <a href="{{ route("mealPlan.edit", ["item" => $item]) }}" class="sr-meta">
                                <div>{{ $item->title }}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection

@section("scripts")
    {{--<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
    </script>--}}

@endsection
