@extends("layouts.layout-2")

@section("title", __("Конфигуратор планов питания"))

@section("styles")
    {{--<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
@endsection

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">{{ __("Конфигуратор планов питания") }}</h1>
            <p style="color: red;">{{ session("error") }}</p>
            <div class="stream-add-wrap">
                <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
                <div class="stream-add"><a href="{{ route("mealPlan.index") }}" class="btn">Планы питания</a></div>
            </div>
            <div class="configurator-block">
                <form action="{{ route("mealPlan.configurator.send") }}" method="POST">
                    @csrf
                    @method("POST")

                    <div class="form-item">
                        <label>{{ __("Цель") }}</label>
                        <select name="target_type" class="form-control select2" required>
                            <option value="похудение" @if(session('target') === 'похудение') selected @endif>{{ __("Похудение") }}</option>
                            <option value="поддержка" @if(session('target') === 'поддержка') selected @endif>{{ __("Поддержание") }}</option>
                            <option value="набор" @if(session('target') === 'набор') selected @endif>{{ __("Набор") }}</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <label>{{ __("Тип меню") }}</label>
                        <select name="menu_type" class="form-control select2" required>
                            <option value="Классическое меню" @if(session('menu') === 'Классическое меню') selected @endif>Classic</option>
                            <option value="Gluten FREE" @if(session('menu') === 'Gluten FREE') selected @endif>GF</option>
                            <option value="Lactose FREE" @if(session('menu') === 'Lactose FREE') selected @endif>LF</option>
                            <option value="Вегетарианское меню" @if(session('menu') === 'Вегетарианское меню') selected @endif>LF</option>
                            <option value="Vegan" @if(session('menu') === 'Vegan') selected @endif>Vegan</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <label>{{ __("Рост") }}</label>
                        <input name="height" type="number" step="0.1" value="{{ session('height') }}" class="form-control" required>
                    </div>

                    <div class="form-item">
                        <label>{{ __("Вес") }}</label>
                        <input name="weight" type="number" step="0.1" value="{{ session('weight') }}" class="form-control" required>
                    </div>

                    <div class="form-action">
                        <button type="submit" class="btn">{{ __('Получить план питания') }}</button>
                    </div>
                </form>

                @if(session('mealPlan'))
                    <div class="meal-plan-result" style="color: green; font-size: 20px;">{{ session('mealPlan')->title }}</div>
                @else
                    <div class="meal-plan-result" style="color: red; font-size: 20px;">{{ __("План питания не найден") }}</div>
                @endif
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
