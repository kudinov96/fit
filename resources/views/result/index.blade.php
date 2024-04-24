@extends("layouts.layout-3")

@section("title", __('Результаты'))

@section("content")
    <div id="main-content">
        <div class="container">
            @if($resultStart)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Стартовые данные') }} <em>({{ __('до') }})</em></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 stat-start">
                            <div>
                                <p>{{ __('Вес') }}: <span>{{ $resultStart->weight }} {{ __('кг') }}</span></p>
                                <p>{{ __('Грудь') }}: <span>{{ $resultStart->breast }} {{ __('см') }}</span></p>
                                <p>{{ __('Талия') }}: <span>{{ $resultStart->waistline }} {{ __('см') }}</span></p>
                                <p>{{ __('Бедра') }}: <span>{{ $resultStart->hips }} {{ __('см') }}</span></p>
                                <p>{{ __('Правая рука') }}: <span>{{ $resultStart->hand }} {{ __('см') }}</span></p>
                                <p>{{ __('Правая нога') }}: <span>{{ $resultStart->leg }} {{ __('см') }}</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 stat-pics">
                            <div>
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_1) }}">
                                    <img src="{{ \Storage::url($resultStart->photo_1) }}" alt="">
                                </a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::START->value }}" data-number="1" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M17.9868 6.85717L14.2246 3.09522C14.1152 2.98577 13.9853 2.89895 13.8423 2.83972C13.6993 2.78049 13.546 2.75 13.3912 2.75C13.2365 2.75 13.0832 2.78049 12.9402 2.83972C12.7972 2.89895 12.6673 2.98577 12.5578 3.09522L2.17718 13.4762C2.06752 13.5854 1.98057 13.7153 1.92133 13.8584C1.8621 14.0014 1.83175 14.1547 1.83203 14.3095V18.0715C1.83203 18.3841 1.9562 18.6838 2.17723 18.9048C2.39825 19.1258 2.69802 19.25 3.0106 19.25H6.77275C6.92756 19.2503 7.08091 19.2199 7.22394 19.1607C7.36698 19.1015 7.49688 19.0145 7.60616 18.9049L17.9868 8.52392C18.0962 8.41448 18.1831 8.28456 18.2423 8.14157C18.3015 7.99858 18.332 7.84532 18.332 7.69055C18.332 7.53577 18.3015 7.38252 18.2423 7.23952C18.1831 7.09653 18.0962 6.96661 17.9868 6.85717ZM3.05185 14.0309L10.4187 6.66356L12.0611 8.30674L4.69426 15.6732L3.05185 14.0309ZM2.84223 18.0715V15.2498L5.83158 18.2399H3.0106C2.96594 18.2399 2.92312 18.2221 2.89155 18.1905C2.85997 18.159 2.84223 18.1161 2.84223 18.0715ZM7.05139 18.0302L5.40898 16.3879L12.7759 9.02057L14.4183 10.6637L7.05139 18.0302ZM17.2721 7.81008L15.133 9.94907L11.1334 5.94973L13.2725 3.8099C13.2882 3.79424 13.3067 3.78183 13.3272 3.77335C13.3476 3.76488 13.3695 3.76052 13.3917 3.76052C13.4138 3.76052 13.4357 3.76488 13.4561 3.77335C13.4766 3.78183 13.4951 3.79424 13.5108 3.8099L17.2721 7.57185C17.2877 7.58749 17.3002 7.60606 17.3086 7.6265C17.3171 7.64693 17.3215 7.66884 17.3215 7.69097C17.3215 7.71309 17.3171 7.735 17.3086 7.75544C17.3002 7.77588 17.2877 7.79444 17.2721 7.81008Z" fill="#EC2383"/>
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_2) }}"><img src="{{ \Storage::url($resultStart->photo_2) }}" alt=""></a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::START->value }}" data-number="2" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M17.9868 6.85717L14.2246 3.09522C14.1152 2.98577 13.9853 2.89895 13.8423 2.83972C13.6993 2.78049 13.546 2.75 13.3912 2.75C13.2365 2.75 13.0832 2.78049 12.9402 2.83972C12.7972 2.89895 12.6673 2.98577 12.5578 3.09522L2.17718 13.4762C2.06752 13.5854 1.98057 13.7153 1.92133 13.8584C1.8621 14.0014 1.83175 14.1547 1.83203 14.3095V18.0715C1.83203 18.3841 1.9562 18.6838 2.17723 18.9048C2.39825 19.1258 2.69802 19.25 3.0106 19.25H6.77275C6.92756 19.2503 7.08091 19.2199 7.22394 19.1607C7.36698 19.1015 7.49688 19.0145 7.60616 18.9049L17.9868 8.52392C18.0962 8.41448 18.1831 8.28456 18.2423 8.14157C18.3015 7.99858 18.332 7.84532 18.332 7.69055C18.332 7.53577 18.3015 7.38252 18.2423 7.23952C18.1831 7.09653 18.0962 6.96661 17.9868 6.85717ZM3.05185 14.0309L10.4187 6.66356L12.0611 8.30674L4.69426 15.6732L3.05185 14.0309ZM2.84223 18.0715V15.2498L5.83158 18.2399H3.0106C2.96594 18.2399 2.92312 18.2221 2.89155 18.1905C2.85997 18.159 2.84223 18.1161 2.84223 18.0715ZM7.05139 18.0302L5.40898 16.3879L12.7759 9.02057L14.4183 10.6637L7.05139 18.0302ZM17.2721 7.81008L15.133 9.94907L11.1334 5.94973L13.2725 3.8099C13.2882 3.79424 13.3067 3.78183 13.3272 3.77335C13.3476 3.76488 13.3695 3.76052 13.3917 3.76052C13.4138 3.76052 13.4357 3.76488 13.4561 3.77335C13.4766 3.78183 13.4951 3.79424 13.5108 3.8099L17.2721 7.57185C17.2877 7.58749 17.3002 7.60606 17.3086 7.6265C17.3171 7.64693 17.3215 7.66884 17.3215 7.69097C17.3215 7.71309 17.3171 7.735 17.3086 7.75544C17.3002 7.77588 17.2877 7.79444 17.2721 7.81008Z" fill="#EC2383"/>
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_3) }}"><img src="{{ \Storage::url($resultStart->photo_3) }}" alt=""></a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::START->value }}" data-number="3" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M17.9868 6.85717L14.2246 3.09522C14.1152 2.98577 13.9853 2.89895 13.8423 2.83972C13.6993 2.78049 13.546 2.75 13.3912 2.75C13.2365 2.75 13.0832 2.78049 12.9402 2.83972C12.7972 2.89895 12.6673 2.98577 12.5578 3.09522L2.17718 13.4762C2.06752 13.5854 1.98057 13.7153 1.92133 13.8584C1.8621 14.0014 1.83175 14.1547 1.83203 14.3095V18.0715C1.83203 18.3841 1.9562 18.6838 2.17723 18.9048C2.39825 19.1258 2.69802 19.25 3.0106 19.25H6.77275C6.92756 19.2503 7.08091 19.2199 7.22394 19.1607C7.36698 19.1015 7.49688 19.0145 7.60616 18.9049L17.9868 8.52392C18.0962 8.41448 18.1831 8.28456 18.2423 8.14157C18.3015 7.99858 18.332 7.84532 18.332 7.69055C18.332 7.53577 18.3015 7.38252 18.2423 7.23952C18.1831 7.09653 18.0962 6.96661 17.9868 6.85717ZM3.05185 14.0309L10.4187 6.66356L12.0611 8.30674L4.69426 15.6732L3.05185 14.0309ZM2.84223 18.0715V15.2498L5.83158 18.2399H3.0106C2.96594 18.2399 2.92312 18.2221 2.89155 18.1905C2.85997 18.159 2.84223 18.1161 2.84223 18.0715ZM7.05139 18.0302L5.40898 16.3879L12.7759 9.02057L14.4183 10.6637L7.05139 18.0302ZM17.2721 7.81008L15.133 9.94907L11.1334 5.94973L13.2725 3.8099C13.2882 3.79424 13.3067 3.78183 13.3272 3.77335C13.3476 3.76488 13.3695 3.76052 13.3917 3.76052C13.4138 3.76052 13.4357 3.76488 13.4561 3.77335C13.4766 3.78183 13.4951 3.79424 13.5108 3.8099L17.2721 7.57185C17.2877 7.58749 17.3002 7.60606 17.3086 7.6265C17.3171 7.64693 17.3215 7.66884 17.3215 7.69097C17.3215 7.71309 17.3171 7.735 17.3086 7.75544C17.3002 7.77588 17.2877 7.79444 17.2721 7.81008Z" fill="#EC2383"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($resultWeek1)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Результаты первой недели') }}</span>
                    </div>
                    <div class="result-wrapper">
                        <p>{{ __('Вес') }}: <span>{{ $resultWeek1->weight }} {{ __('кг') }}</span></p>
                        <p>{{ __('Грудь') }}: <span>{{ $resultWeek1->breast }} {{ __('см') }}</span></p>
                        <p>{{ __('Талия') }}: <span>{{ $resultWeek1->waistline }} {{ __('см') }}</span></p>
                        <p>{{ __('Бедра') }}: <span>{{ $resultWeek1->hips }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая рука') }}: <span>{{ $resultWeek1->hand }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая нога') }}: <span>{{ $resultWeek1->leg }} {{ __('см') }}</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek2)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Результаты второй недели') }}</span>
                    </div>
                    <div class="result-wrapper">
                        <p>{{ __('Вес') }}: <span>{{ $resultWeek2->weight }} {{ __('кг') }}</span></p>
                        <p>{{ __('Грудь') }}: <span>{{ $resultWeek2->breast }} {{ __('см') }}</span></p>
                        <p>{{ __('Талия') }}: <span>{{ $resultWeek2->waistline }} {{ __('см') }}</span></p>
                        <p>{{ __('Бедра') }}: <span>{{ $resultWeek2->hips }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая рука') }}: <span>{{ $resultWeek2->hand }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая нога') }}: <span>{{ $resultWeek2->leg }} {{ __('см') }}</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek3)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Результаты третьей недели') }}</span>
                    </div>
                    <div class="result-wrapper">
                        <p>{{ __('Вес') }}: <span>{{ $resultWeek3->weight }} {{ __('кг') }}</span></p>
                        <p>{{ __('Грудь') }}: <span>{{ $resultWeek3->breast }} {{ __('см') }}</span></p>
                        <p>{{ __('Талия') }}: <span>{{ $resultWeek3->waistline }} {{ __('см') }}</span></p>
                        <p>{{ __('Бедра') }}: <span>{{ $resultWeek3->hips }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая рука') }}: <span>{{ $resultWeek3->hand }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая нога') }}: <span>{{ $resultWeek3->leg }} {{ __('см') }}</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek4)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Результаты четвертой недели') }}</span>
                    </div>
                    <div class="result-wrapper">
                        <p>{{ __('Вес') }}: <span>{{ $resultWeek4->weight }} {{ __('кг') }}</span></p>
                        <p>{{ __('Грудь') }}: <span>{{ $resultWeek4->breast }} {{ __('см') }}</span></p>
                        <p>{{ __('Талия') }}: <span>{{ $resultWeek4->waistline }} {{ __('см') }}</span></p>
                        <p>{{ __('Бедра') }}: <span>{{ $resultWeek4->hips }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая рука') }}: <span>{{ $resultWeek4->hand }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая нога') }}: <span>{{ $resultWeek4->leg }} {{ __('см') }}</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek5)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Результаты пятой недели') }}</span>
                    </div>
                    <div class="result-wrapper">
                        <p>{{ __('Вес') }}: <span>{{ $resultWeek5->weight }} {{ __('кг') }}</span></p>
                        <p>{{ __('Грудь') }}: <span>{{ $resultWeek5->breast }} {{ __('см') }}</span></p>
                        <p>{{ __('Талия') }}: <span>{{ $resultWeek5->waistline }} {{ __('см') }}</span></p>
                        <p>{{ __('Бедра') }}: <span>{{ $resultWeek5->hips }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая рука') }}: <span>{{ $resultWeek5->hand }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая нога') }}: <span>{{ $resultWeek5->leg }} {{ __('см') }}</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek6)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Результаты шестой недели') }}</span>
                    </div>
                    <div class="result-wrapper">
                        <p>{{ __('Вес') }}: <span>{{ $resultWeek6->weight }} {{ __('кг') }}</span></p>
                        <p>{{ __('Грудь') }}: <span>{{ $resultWeek6->breast }} {{ __('см') }}</span></p>
                        <p>{{ __('Талия') }}: <span>{{ $resultWeek6->waistline }} {{ __('см') }}</span></p>
                        <p>{{ __('Бедра') }}: <span>{{ $resultWeek6->hips }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая рука') }}: <span>{{ $resultWeek6->hand }} {{ __('см') }}</span></p>
                        <p>{{ __('Правая нога') }}: <span>{{ $resultWeek6->leg }} {{ __('см') }}</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek6)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Финишные данные') }} <em>{{ __('(после)') }}</em></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 stat-start">
                            <div>
                                <p>{{ __('Вес') }}: <span>{{ $resultWeek6->weight }} {{ __('кг') }}</span></p>
                                <p>{{ __('Грудь') }}: <span>{{ $resultWeek6->breast }} {{ __('см') }}</span></p>
                                <p>{{ __('Талия') }}: <span>{{ $resultWeek6->waistline }} {{ __('см') }}</span></p>
                                <p>{{ __('Бедра') }}: <span>{{ $resultWeek6->hips }} {{ __('см') }}</span></p>
                                <p>{{ __('Правая рука') }}: <span>{{ $resultWeek6->hand }} {{ __('см') }}</span></p>
                                <p>{{ __('Правая нога') }}: <span>{{ $resultWeek6->leg }} {{ __('см') }}</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 stat-pics">
                            <div>
                                <a data-fancybox="user-gallery-after" href="{{ \Storage::url($resultWeek6->photo_1) }}">
                                    <img src="{{ \Storage::url($resultWeek6->photo_1) }}" alt="">
                                </a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::WEEK_6->value }}" data-number="1" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M17.9868 6.85717L14.2246 3.09522C14.1152 2.98577 13.9853 2.89895 13.8423 2.83972C13.6993 2.78049 13.546 2.75 13.3912 2.75C13.2365 2.75 13.0832 2.78049 12.9402 2.83972C12.7972 2.89895 12.6673 2.98577 12.5578 3.09522L2.17718 13.4762C2.06752 13.5854 1.98057 13.7153 1.92133 13.8584C1.8621 14.0014 1.83175 14.1547 1.83203 14.3095V18.0715C1.83203 18.3841 1.9562 18.6838 2.17723 18.9048C2.39825 19.1258 2.69802 19.25 3.0106 19.25H6.77275C6.92756 19.2503 7.08091 19.2199 7.22394 19.1607C7.36698 19.1015 7.49688 19.0145 7.60616 18.9049L17.9868 8.52392C18.0962 8.41448 18.1831 8.28456 18.2423 8.14157C18.3015 7.99858 18.332 7.84532 18.332 7.69055C18.332 7.53577 18.3015 7.38252 18.2423 7.23952C18.1831 7.09653 18.0962 6.96661 17.9868 6.85717ZM3.05185 14.0309L10.4187 6.66356L12.0611 8.30674L4.69426 15.6732L3.05185 14.0309ZM2.84223 18.0715V15.2498L5.83158 18.2399H3.0106C2.96594 18.2399 2.92312 18.2221 2.89155 18.1905C2.85997 18.159 2.84223 18.1161 2.84223 18.0715ZM7.05139 18.0302L5.40898 16.3879L12.7759 9.02057L14.4183 10.6637L7.05139 18.0302ZM17.2721 7.81008L15.133 9.94907L11.1334 5.94973L13.2725 3.8099C13.2882 3.79424 13.3067 3.78183 13.3272 3.77335C13.3476 3.76488 13.3695 3.76052 13.3917 3.76052C13.4138 3.76052 13.4357 3.76488 13.4561 3.77335C13.4766 3.78183 13.4951 3.79424 13.5108 3.8099L17.2721 7.57185C17.2877 7.58749 17.3002 7.60606 17.3086 7.6265C17.3171 7.64693 17.3215 7.66884 17.3215 7.69097C17.3215 7.71309 17.3171 7.735 17.3086 7.75544C17.3002 7.77588 17.2877 7.79444 17.2721 7.81008Z" fill="#EC2383"/>
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <a data-fancybox="user-gallery-after" href="{{ \Storage::url($resultWeek6->photo_2) }}">
                                    <img src="{{ \Storage::url($resultWeek6->photo_2) }}" alt="">
                                </a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::WEEK_6->value }}" data-number="2" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M17.9868 6.85717L14.2246 3.09522C14.1152 2.98577 13.9853 2.89895 13.8423 2.83972C13.6993 2.78049 13.546 2.75 13.3912 2.75C13.2365 2.75 13.0832 2.78049 12.9402 2.83972C12.7972 2.89895 12.6673 2.98577 12.5578 3.09522L2.17718 13.4762C2.06752 13.5854 1.98057 13.7153 1.92133 13.8584C1.8621 14.0014 1.83175 14.1547 1.83203 14.3095V18.0715C1.83203 18.3841 1.9562 18.6838 2.17723 18.9048C2.39825 19.1258 2.69802 19.25 3.0106 19.25H6.77275C6.92756 19.2503 7.08091 19.2199 7.22394 19.1607C7.36698 19.1015 7.49688 19.0145 7.60616 18.9049L17.9868 8.52392C18.0962 8.41448 18.1831 8.28456 18.2423 8.14157C18.3015 7.99858 18.332 7.84532 18.332 7.69055C18.332 7.53577 18.3015 7.38252 18.2423 7.23952C18.1831 7.09653 18.0962 6.96661 17.9868 6.85717ZM3.05185 14.0309L10.4187 6.66356L12.0611 8.30674L4.69426 15.6732L3.05185 14.0309ZM2.84223 18.0715V15.2498L5.83158 18.2399H3.0106C2.96594 18.2399 2.92312 18.2221 2.89155 18.1905C2.85997 18.159 2.84223 18.1161 2.84223 18.0715ZM7.05139 18.0302L5.40898 16.3879L12.7759 9.02057L14.4183 10.6637L7.05139 18.0302ZM17.2721 7.81008L15.133 9.94907L11.1334 5.94973L13.2725 3.8099C13.2882 3.79424 13.3067 3.78183 13.3272 3.77335C13.3476 3.76488 13.3695 3.76052 13.3917 3.76052C13.4138 3.76052 13.4357 3.76488 13.4561 3.77335C13.4766 3.78183 13.4951 3.79424 13.5108 3.8099L17.2721 7.57185C17.2877 7.58749 17.3002 7.60606 17.3086 7.6265C17.3171 7.64693 17.3215 7.66884 17.3215 7.69097C17.3215 7.71309 17.3171 7.735 17.3086 7.75544C17.3002 7.77588 17.2877 7.79444 17.2721 7.81008Z" fill="#EC2383"/>
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <a data-fancybox="user-gallery-after" href="{{ \Storage::url($resultWeek6->photo_3) }}">
                                    <img src="{{ \Storage::url($resultWeek6->photo_3) }}" alt="">
                                </a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::WEEK_6->value }}" data-number="3" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M17.9868 6.85717L14.2246 3.09522C14.1152 2.98577 13.9853 2.89895 13.8423 2.83972C13.6993 2.78049 13.546 2.75 13.3912 2.75C13.2365 2.75 13.0832 2.78049 12.9402 2.83972C12.7972 2.89895 12.6673 2.98577 12.5578 3.09522L2.17718 13.4762C2.06752 13.5854 1.98057 13.7153 1.92133 13.8584C1.8621 14.0014 1.83175 14.1547 1.83203 14.3095V18.0715C1.83203 18.3841 1.9562 18.6838 2.17723 18.9048C2.39825 19.1258 2.69802 19.25 3.0106 19.25H6.77275C6.92756 19.2503 7.08091 19.2199 7.22394 19.1607C7.36698 19.1015 7.49688 19.0145 7.60616 18.9049L17.9868 8.52392C18.0962 8.41448 18.1831 8.28456 18.2423 8.14157C18.3015 7.99858 18.332 7.84532 18.332 7.69055C18.332 7.53577 18.3015 7.38252 18.2423 7.23952C18.1831 7.09653 18.0962 6.96661 17.9868 6.85717ZM3.05185 14.0309L10.4187 6.66356L12.0611 8.30674L4.69426 15.6732L3.05185 14.0309ZM2.84223 18.0715V15.2498L5.83158 18.2399H3.0106C2.96594 18.2399 2.92312 18.2221 2.89155 18.1905C2.85997 18.159 2.84223 18.1161 2.84223 18.0715ZM7.05139 18.0302L5.40898 16.3879L12.7759 9.02057L14.4183 10.6637L7.05139 18.0302ZM17.2721 7.81008L15.133 9.94907L11.1334 5.94973L13.2725 3.8099C13.2882 3.79424 13.3067 3.78183 13.3272 3.77335C13.3476 3.76488 13.3695 3.76052 13.3917 3.76052C13.4138 3.76052 13.4357 3.76488 13.4561 3.77335C13.4766 3.78183 13.4951 3.79424 13.5108 3.8099L17.2721 7.57185C17.2877 7.58749 17.3002 7.60606 17.3086 7.6265C17.3171 7.64693 17.3215 7.66884 17.3215 7.69097C17.3215 7.71309 17.3171 7.735 17.3086 7.75544C17.3002 7.77588 17.2877 7.79444 17.2721 7.81008Z" fill="#EC2383"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
                    <div class="modal-title">{{ __("Фото успешно изменено!") }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit stream modal  -->
    <div class="modal fade" id="editPhoto" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Редактировать фото') }} <span></span></div>
                    <form class="needs-validation" action="{{ route("result.updatePhoto") }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("PUT")

                        <input type="hidden" name="type" value="">
                        <input type="hidden" name="number" value="">

                        <div class="qs-inputs files files_custom row">
                            <input id="foto" name="photo" type="file" required>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __("Сохранить") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $('#foto').fileinput({
                showCaption: false,
                hideThumbnailContent: false,
                dropZoneEnabled: false,
                showPreview: true,
                showUploadedThumbs: true,
                showUpload: false,
                showZoom: false,
                browseLabel: '{{ __("Загрузить фото") }}',
                browseClass: 'btn-foto btn-foto_custom',
                removeLabel: '{{ __("Удалить") }}',
                removeClass: 'd-none'
            }).on('fileuploaded', function(event, previewId, index, fileId) {

            });
        });
    </script>
@endsection
