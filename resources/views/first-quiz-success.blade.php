@extends("layouts.layout-1")

@section("title", __('Анкета'))

@section("content")
    <body class="quiz">

    <div id="page">
        {{ $errors }}
        <div class="quiz-wrapper d-block">
            <div class="quiz-head">
                <a href="{{ route("marathon.index") }}" class="quiz-goback"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.792892 7.29289C0.402369 7.68342 0.402369 8.31658 0.792893 8.70711L7.15685 15.0711C7.54738 15.4616 8.18054 15.4616 8.57107 15.0711C8.96159 14.6805 8.96159 14.0474 8.57107 13.6569L2.91421 8L8.57107 2.34315C8.96159 1.95262 8.96159 1.31946 8.57107 0.928933C8.18054 0.538409 7.54738 0.538409 7.15685 0.928933L0.792892 7.29289ZM16.5 7L1.5 7L1.5 9L16.5 9L16.5 7Z" fill="#121619"/>
                    </svg></a>
                <img src="{{ asset("images/logo.svg") }}" width="167" height="35" alt="">
            </div>
            <form class="quiz-slider_wrapper">
                <div class="quiz-count">Спасибо за участие!</div>
                <div class="quiz-slider">
                    <div class="quiz-slide_item step-7">
                        <div class="thanks-wrapper">
                            <p>Твои ответы отправлены!</p>
                            <p>Вскоре в личном кабинете появится индивидуальный план питания, подобранный на основе твоих ответов.</p>
                            <p>До встречи на проекте!</p>
                            <p><a href="{{ route("marathon.index") }}" class="btn">в кабинет</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
