@extends("layouts.layout-1")

@section("title", __('Забыли пароль'))

@section("content")
    <body>

    <div id="page">
        <x-header-1></x-header-1>

        <div id="inline-form">
            <div class="container">
                <div class="inline-modal">
                    <div class="modal-title">{{ __('Забыли свой пароль?') }}</div>
                    <form class="needs-validation" method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf
                        @method('POST')
                        <div class="form-item">
                            <label>{{ __('Логин (e-mail)') }}</label>
                            <input name="email" type="email" value="" class="form-control" required>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('Восстановить') }}</button>
                        </div>
                    </form>
                    <div class="modal-link"><a href="{{ route('login') }}">{{ __('Вернуться на страницу авторизации') }}</a></div>
                </div>
            </div>
        </div>

        <!-- success modal -->
        <div class="modal fade" id="thanksModal" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Мы отправили ссылку на вашу почту:') }}</div>
                        <div class="modal-mail">anna.flowe@gmail.com</div>
                        <div class="modal-noty">{{ __('Если вы не получили электронное письмо в течение 5 минут, проверьте папку «Спам».') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="forgotPasswordFailed" tabindex="-1" aria-labelledby="forgotPasswordFailedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Ошибка') }}</div>
                        <div class="modal-noty">{{ __('Вы неправильно указали эл. почту. Попробуйте ещё раз') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="forgotPasswordSuccess" tabindex="-1" aria-labelledby="forgotPasswordSuccessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Мы отправили ссылку на вашу почту:') }}</div>
                        <div class="modal-mail">{{ Request::get('email') ?? null }}</div>
                        <div class="modal-noty">{{ __('Если вы не получили электронное письмо в течение 5 минут, проверьте папку «Спам».') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="resetPasswordFailed" tabindex="-1" aria-labelledby="resetPasswordFailedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Ошибка') }}</div>
                        <div class="modal-noty">{{ __('Ссылка на сброс пароля устарела. Попробуйте снова') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
