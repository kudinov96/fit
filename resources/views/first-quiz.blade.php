@extends("layouts.layout-1")

@section("title", __('Анкета'))

@section("content")
    <body class="quiz">

    <div id="page">
        <div class="quiz-intro container">
            <p>{{ __('Заполни анкету, чтобы получить индивидуальный план питания и тренировок!') }}</p>
            <p>{{ __('Выбери язык интерфейса') }}</p>
            <ul>
                <li><a href="{{ route('first_quiz.index', ['lang' => 'lv']) }}" @class(['quiz-en', 'active' => app()->currentLocale() === 'lv'])>LV</a></li>
                <li><a href="{{ route('first_quiz.index', ['lang' => 'ru']) }}" @class(['quiz-en', 'active' => app()->currentLocale() === 'ru'])>RU</a></li>
                <li><a href="{{ route('first_quiz.index', ['lang' => 'en']) }}" @class(['quiz-en', 'active' => app()->currentLocale() === 'en'])>EN</a></li>
            </ul>
            <p>
                <a class="quiz-start btn">{{ __('Начать заполнение анкеты') }}</a>
            </p>
        </div>
        <div class="quiz-wrapper">
            <div class="quiz-head">
                <div class="quiz-goback"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.792892 7.29289C0.402369 7.68342 0.402369 8.31658 0.792893 8.70711L7.15685 15.0711C7.54738 15.4616 8.18054 15.4616 8.57107 15.0711C8.96159 14.6805 8.96159 14.0474 8.57107 13.6569L2.91421 8L8.57107 2.34315C8.96159 1.95262 8.96159 1.31946 8.57107 0.928933C8.18054 0.538409 7.54738 0.538409 7.15685 0.928933L0.792892 7.29289ZM16.5 7L1.5 7L1.5 9L16.5 9L16.5 7Z" fill="#121619"/>
                    </svg></div>
                <div class="quiz-prev"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.792892 7.29289C0.402369 7.68342 0.402369 8.31658 0.792893 8.70711L7.15685 15.0711C7.54738 15.4616 8.18054 15.4616 8.57107 15.0711C8.96159 14.6805 8.96159 14.0474 8.57107 13.6569L2.91421 8L8.57107 2.34315C8.96159 1.95262 8.96159 1.31946 8.57107 0.928933C8.18054 0.538409 7.54738 0.538409 7.15685 0.928933L0.792892 7.29289ZM16.5 7L1.5 7L1.5 9L16.5 9L16.5 7Z" fill="#121619"/>
                    </svg></div>
                <img src="{{ asset('images/logo.svg') }}" width="167" height="35" alt="">
            </div>
            <form class="quiz-slider_wrapper" method="POST" action="{{ route('first_quiz.store') }}">
                @csrf
                @method('POST')

                <div class="quiz-count">{{ __('Шаг') }} <span>1</span> {{ __('из') }} 6</div>
                <div class="quiz-slider">
                    <div class="quiz-slide_item step-1">
                        <div class="qs-title">{{ __('Укажи свои параметры') }}</div>
                        <div class="qs-inputs row">
                            <div class="col-lg-4">
                                <label>{{ __('Возраст') }}</label>
                                <input name="age" type="number" value="" data-step="1" class="form-control quiz-required">
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('Рост') }} <span>({{ __('см') }})</span></label>
                                <input name="height" type="number" step="0.1" min="0.1" class="form-control quiz-required">
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('Вес') }} <span>({{ __('кг') }})</span></label>
                                <input name="weight" type="number" step="0.1" class="form-control quiz-required">
                            </div>
                        </div>
                    </div>
                    <div class="quiz-slide_item step-2">
                        <div class="qs-title">{{ __('Выбери свою цель') }}</div>
                        <div class="qs-inputs">
                            <div class="form-radios">
                                <div>
                                    <input id="goal-1" type="radio" name="target" value="У меня избыточный вес, я хочу стать стройнее, уменьшить количество жира в организме и стать более спортивной (похудение)" checked>
                                    <label for="goal-1">{{ __('У меня избыточный вес, я хочу стать стройнее, уменьшить количество жира в организме и стать более спортивной (похудение)') }}</label>
                                </div>
                                <div>
                                    <input id="goal-2" type="radio" name="target" value="Меня практически все устраивает, но я хочу стать сильнее, иметь более рельефные мышцы и лучшее отражение в зеркале (поддержка)">
                                    <label for="goal-2">{{ __('Меня практически все устраивает, но я хочу стать сильнее, иметь более рельефные мышцы и лучшее отражение в зеркале (поддержка)') }}</label>
                                </div>
                                <div>
                                    <input id="goal-3" type="radio" name="target" value="Я стройная, хочу стать сильнее и набрать вес, мышечную массу (набор)">
                                    <label for="goal-3">{{ __('Я стройная, хочу стать сильнее и набрать вес, мышечную массу (набор)') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-slide_item step-3">
                        <div class="qs-title">{{ __('Выбери вариант меню') }}</div>
                        <div class="qs-inputs">
                            <div class="form-radios form-radios_flex">
                                <div>
                                    <input id="menu-1" type="radio" name="menu" value="Классическое меню" checked>
                                    <label for="menu-1">{{ __('Классическое меню') }}</label>
                                </div>
                                <div>
                                    <input id="menu-2" type="radio" name="menu" value="Вегетарианское меню">
                                    <label for="menu-2">{{ __('Вегетарианское меню') }}</label>
                                </div>
                                <div>
                                    <input id="menu-3" type="radio" name="menu" value="Gluten FREE">
                                    <label for="menu-3">{{ __('Gluten FREE') }}</label>
                                </div>
                                <div>
                                    <input id="menu-4" type="radio" name="menu" value="Lactose FREE">
                                    <label for="menu-4">{{ __('Lactose FREE') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-slide_item step-4">
                        <div class="qs-title">{{ __('Ответь на вопрос') }}</div>
                        <div class="qs-subtitle">{{ __('Принимаешь ли ты какие-либо пищевые добавки или лекарства ежедневно?') }}</div>
                        <div class="qs-description">{{ __('Протеиновые коктейли, заменители пищи, витамины, противозачаточные средства, лекарства от нервов, сердца, снотворное и т. д.') }}</div>
                        <div class="qs-inputs">
                            <div>
                                <label>{{ __('Напиши тут') }}</label>
                                <textarea name="nutritional_supplements" data-step="4" class="form-control quiz-required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-slide_item step-5">
                        <div class="qs-title">{{ __('Ответь на вопрос') }}</div>
                        <div class="qs-subtitle">{{ __('Были ли у тебя или есть какие-либо проблемы со здоровьем?') }}</div>
                        <div class="qs-description">{{ __('Расстройства пищевого поведения, целиакия, булимия, заболевания щитовидной железы, проблемы с зачатием/вынашиванием детей и т. д.') }}</div>
                        <div class="qs-inputs">
                            <div>
                                <label>{{ __('Напиши тут') }}</label>
                                <textarea name="health_problems" data-step="5" class="form-control quiz-required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-slide_item step-6">
                        <div class="qs-title">{{ __('Ответь на вопрос') }}</div>
                        <div class="qs-subtitle">{{ __('Был ли у тебя частный тренер/личные тренировки/план питания?') }}</div>
                        <div class="qs-inputs">
                            <div class="form-radios form-radios_flex">
                                <div>
                                    <input id="experience-1" type="radio" name="experience_options" value="Да" checked>
                                    <label for="experience-1">{{ __('Да') }}</label>
                                </div>
                                <div>
                                    <input id="experience-2" type="radio" name="experience_options" value="Нет">
                                    <label for="experience-2">{{ __('Нет') }}</label>
                                </div>
                                <div>
                                    <input id="experience-3" type="radio" name="experience_options" value="Я участница предыдущих проектов FIT QUEEN">
                                    <label for="experience-3">{{ __('Я участница предыдущих проектов FIT QUEEN') }}</label>
                                </div>
                                <div>
                                    <input id="experience-4" type="radio" name="experience_options" value="Другое">
                                    <label for="experience-4">{{ __('Другое') }}</label>
                                </div>
                            </div>
                            <div class="other-message">
                                <textarea class="form-control" placeholder="{{ __('Напиши тут') }}"></textarea>
                                <input type="hidden" name="experience" id="experience-result">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quiz-next">
                    <a class="btn quiz-disabled">{{ __('Далее') }}</a>
                    <button class="btn" type="submit">{{ __('Отправить') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var formQuiz = document.querySelector('.quiz-slider_wrapper');
            var otherRadio = formQuiz.querySelector('input[type="radio"][value="Другое"]');
            var textArea = formQuiz.querySelector('.other-message textarea');
            var experienceResult = formQuiz.querySelector('#experience-result');

            // Функция для обновления значения скрытого поля
            function updateExperienceValue() {
                if (otherRadio.checked) {
                    experienceResult.value = textArea.value; // Значение из textarea
                } else {
                    var selectedRadio = formQuiz.querySelector('input[type="radio"][name="experience_options"]:checked');
                    if (selectedRadio) {
                        experienceResult.value = selectedRadio.value; // Значение из радио-кнопки
                    }
                }
            }

            // Обработчики событий для радио-кнопок и textarea
            formQuiz.querySelectorAll('input[type="radio"][name="experience_options"]').forEach(function(radio) {
                radio.addEventListener('change', updateExperienceValue);
            });
            textArea.addEventListener('input', updateExperienceValue);

            // Начальное обновление значения
            updateExperienceValue();
        });
    </script>
@endsection
