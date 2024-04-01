@extends("layouts.layout-2")

@section("title", __("Настройки профиля"))

@section("content")
    <div id="main-content">
        <div class="container">
            <div class="settings-box settings-head">
                <div class="user-info">
                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.70833 24.6665L4.625 7.70817L13.1042 15.4165L18.5 6.1665L23.8958 15.4165L32.375 7.70817L29.2917 24.6665H7.70833ZM29.2917 29.2915C29.2917 30.2165 28.675 30.8332 27.75 30.8332H9.25C8.325 30.8332 7.70833 30.2165 7.70833 29.2915V27.7498H29.2917V29.2915Z" fill="#EC2383"/>
                    </svg>
                    <div>
                        <span>{{ $user->name }}</span>
                        {{ $user->email }}
                    </div>
                </div>
            </div>

            <div class="settings-box settings-form">
                <div class="settings-form_title"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.9987 10.0002C9.11464 10.0002 8.2668 9.64897 7.64168 9.02385C7.01655 8.39873 6.66536 7.55088 6.66536 6.66683C6.66536 5.78277 7.01655 4.93493 7.64168 4.30981C8.2668 3.68469 9.11464 3.3335 9.9987 3.3335C10.8828 3.3335 11.7306 3.68469 12.3557 4.30981C12.9808 4.93493 13.332 5.78277 13.332 6.66683C13.332 7.55088 12.9808 8.39873 12.3557 9.02385C11.7306 9.64897 10.8828 10.0002 9.9987 10.0002ZM9.9987 12.5002C12.6537 12.5002 15.0362 12.976 16.6654 15.0527V16.6668H3.33203V15.0527C4.9612 12.9752 7.3437 12.5002 9.9987 12.5002Z" fill="#EC2383"/>
                  </svg> </span>{{ __('Учетные данные') }}</div>
                <form class="form-flex needs-validation settings-form" method="POST" action="{{ route("profile.storeCredentials") }}" novalidate>
                    @csrf
                    @method("PUT")

                    <div class="form-item">
                        <label>{{ __('Имя, Фамилия') }}</label>
                        <input name="name" type="text" class="form-control" value="{{ $user->name }}" required>
                        <div class="invalid-feedback">
                            {{ __('Введите имя') }}
                        </div>
                    </div>
                    <div class="form-item">
                        <label>{{ __('Телефон') }}</label>
                        <input name="phone" type="tel" class="form-control" value="{{ $user->phone }}" required>
                        <div class="invalid-feedback">
                            {{ __('Введите корректный номер телефона') }}
                        </div>
                    </div>
                    <div class="form-item form-item_action">
                        <button type="submit" class="btn">{{ __('Сохранить изменения') }}</button>
                    </div>
                </form>
            </div>

            <div class="settings-box settings-form">
                <div class="settings-form_title"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_519_4422)">
                            <path d="M16 32C7.1632 32 0 24.8368 0 16C0 7.1632 7.1632 0 16 0C24.8368 0 32 7.1632 32 16C32 24.8368 24.8368 32 16 32ZM14.4 17.2672V22.4H17.6V17.2672C18.4422 16.8996 19.1322 16.2532 19.5539 15.4368C19.9757 14.6203 20.1034 13.6835 19.9156 12.7839C19.7279 11.8843 19.2361 11.0768 18.523 10.4972C17.8099 9.91756 16.919 9.60114 16 9.60114C15.081 9.60114 14.1901 9.91756 13.477 10.4972C12.7639 11.0768 12.2721 11.8843 12.0844 12.7839C11.8966 13.6835 12.0243 14.6203 12.4461 15.4368C12.8678 16.2532 13.5578 16.8996 14.4 17.2672Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_519_4422">
                                <rect width="32" height="32" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg> {{ __('Пароль') }}</div>
                <form class="form needs-validation settings-form" method="POST" action="{{ route("profile.changePassword") }}" novalidate>
                    @csrf
                    @method("PUT")

                    <div class="form-item">
                        <label>{{ __('Текущий пароль') }}</label>
                        <input name="current_password" type="password" class="form-control" required>
                        <div class="invalid-feedback">
                            {{ __('Введите текущий пароль') }}
                        </div>
                    </div>
                    <div class="form-item">
                        <label>{{ __('Новый пароль') }}</label>
                        <input name="password" type="password" class="form-control" required>
                        <div class="invalid-feedback">
                            {{ __('Введите новый пароль') }}
                        </div>
                    </div>
                    <div class="form-item">
                        <label>{{ __('Повторите пароль') }}</label>
                        <input name="password_confirmation" type="password" class="form-control" required>
                        <div class="invalid-feedback">
                            {{ __('Повторите новый пароль') }}
                        </div>
                    </div>
                    <div class="form-item form-item_action">
                        <button type="submit" class="btn">{{ __('Сохранить изменения') }}</button>
                    </div>
                </form>
            </div>

            <div class="settings-box settings-form">
                <div class="settings-form_title"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_519_4422)">
                            <path d="M16 32C7.1632 32 0 24.8368 0 16C0 7.1632 7.1632 0 16 0C24.8368 0 32 7.1632 32 16C32 24.8368 24.8368 32 16 32ZM14.4 17.2672V22.4H17.6V17.2672C18.4422 16.8996 19.1322 16.2532 19.5539 15.4368C19.9757 14.6203 20.1034 13.6835 19.9156 12.7839C19.7279 11.8843 19.2361 11.0768 18.523 10.4972C17.8099 9.91756 16.919 9.60114 16 9.60114C15.081 9.60114 14.1901 9.91756 13.477 10.4972C12.7639 11.0768 12.2721 11.8843 12.0844 12.7839C11.8966 13.6835 12.0243 14.6203 12.4461 15.4368C12.8678 16.2532 13.5578 16.8996 14.4 17.2672Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_519_4422">
                                <rect width="32" height="32" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg> {{ __('Язык') }}</div>
                <form class="form needs-validation settings-form" method="POST" action="{{ route("profile.changeLang") }}" novalidate>
                    @csrf
                    @method("PUT")

                    <div class="form-item">
                        <select class="form-select custom-select" name="language" required>
                            <option value="ru" @if($user->language === "ru") selected @endif>Русский</option>
                            <option value="lv" @if($user->language === "lv") selected @endif>Latviski</option>
                            <option value="en" @if($user->language === "en") selected @endif>English</option>
                        </select>
                    </div>
                    <div class="form-item form-item_action">
                        <button type="submit" class="btn">{{ __('Сохранить изменения') }}</button>
                    </div>
                </form>
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
                    <div class="modal-title">{{ __('Изменения сохранены') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
