@extends("layouts.layout-2")

@section("title", $program->name . " - " . __('Неделя') . " - " . $week)

@section("styles")
    {{--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
@endsection

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ $program->name }} - {{ __('Неделя') }} - {{ $week }}</h1>
            <p style="color: red;">{{ session("error") }}</p>
            <div class="stream-add-wrap">
                <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
                <div class="stream-add"><a href="{{ route("program.view", ["item" => $program->id]) }}" class="btn">{{ __('К неделям') }}</a></div>
                <div class="stream-add"><a href="{{ route("training.index.create", ["item" => $program->id, "week" => $week]) }}" class="btn">{{ __('+ Создать тренировку') }}</a></div>
            </div>
            <div class="stream-rows stream-rows_training">
                @foreach($trainingsPerDays as $key => $day)
                    <div style="margin-bottom: 15px; font-size: 22px; font-weight: 700;">Day {{ $key }}</div>

                    @foreach($day as $training)
                        <div class="stream-item">
                            <div @class(["stream-row"])>
                                <a href="{{ route("training.edit", ["item" => $training->program, "training" => $training]) }}" class="sr-meta">
                                    <div>{{ $training->title }} <span>({{ __('День') }} {{ $training->day }}, {{ $training->where }})</span></div>
                                </a>

                                <form method="POST" action="{{ route("training.duplicate", ["training" => $training]) }}">
                                    @csrf
                                    @method("POST")

                                    <input type="hidden" name="week" value="{{ $week }}">
                                    <button class="btn" type="submit" style="padding: 14px 16px; font-size: 12px;">copy</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
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
