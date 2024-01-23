@extends("layouts.layout-1")

@section("title", __('Новый пароль'))

@section("content")
    <body>

    <div id="page">
        <x-header-1></x-header-1>

        <div id="inline-form">
            <div class="container">
                <div class="inline-modal">
                    <div class="modal-title">Создайте новый пароль</div>
                    @if(!empty(json_decode($errors)))
                        <div class="validation-error">
                            Пароли не совпадают, либо недостаточная длина пароля (от 8 символов).
                        </div>
                    @endif
                    <form class="needs-validation" method="POST" action="{{ route("password.update") }}" novalidate>
                        @csrf
                        @method("POST")

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <input type="hidden" name="email" value="{{ $request->email }}">

                        <div class="form-item">
                            <input name="password" type="password" value="" class="form-control" placeholder="Новый пароль" required>
                            <div class="invalid-feedback">
                                Введите новый пароль
                            </div>
                        </div>
                        <div class="form-item">
                            <input name="password_confirmation" type="password" value="" class="form-control" placeholder="Повторите пароль"  required>
                            <div class="invalid-feedback">
                                Введите пароль
                            </div>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">изменить пароль</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
