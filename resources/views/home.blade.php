@extends("layouts.layout-1")

@section("title", __('Кабинет'))

@section("content")
    <body class="home">

    <div id="page">
        <x-header-1></x-header-1>

        <div id="first-screen">
            <div class="container">
                <div class="fs-text">
                    <h1><span>Fit queen</span> BOMBSHELL</h1>
                    <p>{{ __('Личный кабинет доступен только участникам программы.') }}</p>
                    <p>{{ __('Если Вы еще не с нами - скорее присоединяйтесь!') }}</p>
                    <div class="fs-btns">
                        @if($currentStream)
                            <a href="https://fitqueen.eu/" target="_blank" class="btn">{{ __('К оплате') }}</a>
                        @else
                            <a data-bs-toggle="modal" data-bs-target="#payModal" class="btn btn-disabled">{{ __('К оплате') }}</a>
                        @endif
                        <a href="{{ route('login', ["lang" => app()->currentLocale()]) }}" class="btn btn-white">{{ __('Войти') }}</a>
                    </div>
                </div>
                <div class="fs-pic">
                    <img src="{{ asset('images/girl.png') }}" alt="">
                </div>
            </div>
        </div>

        <x-footer></x-footer>
    </div>
@endsection
