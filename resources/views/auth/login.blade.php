@extends("layouts.layout-1")

@section("title", __('Авторизация'))

@section("content")
    <body>

    <div id="page">
        <x-header-1></x-header-1>

        <div id="inline-form">
            <div class="container">
                <div class="inline-modal">
                    <div class="modal-title">{{ __('Вход в личный кабинет') }}</div>
                    <form class="needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf
                        @method('POST')

                        <div class="form-item">
                            <label>{{ __('Логин (e-mail)') }}</label>
                            <input name="email" type="email" value="" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label>{{ __('Пароль') }}</label>
                            <input name="password" type="password" value="" class="form-control" required>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('Войти') }}</button>
                        </div>
                    </form>
                    <div class="modal-link"><a href="{{ route('password.request') }}">{{ __('Забыли пароль?') }}</a></div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="loginFailed" tabindex="-1" aria-labelledby="loginFailedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Ошибка') }}</div>
                        <div class="modal-noty">{{ __('Вы неправильно указали эл. почту или пароль. Попробуйте ещё раз') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="resetPasswordSuccess" tabindex="-1" aria-labelledby="resetPasswordSuccessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Пароль успешно изменен') }}</div>
                        <div class="modal-noty">{{ __('Теперь вы можете авторизоваться под новым паролем') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
