@extends("layouts.layout-2")

@section("title", __("Участник - данные не загружены"))

@section("content")
    <div id="main-content">
        <div class="container">
            <div class="trainer-head">
                <a href="#"><svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM20 7L1 7V9L20 9V7Z" fill="white"/>
                    </svg> {{ __('назад') }}</a>
                <h1 class="text-center">{{ $user->name }}</h1>
            </div>
            <div class="member-contacts">
                <div>
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.79444 21C4.28333 21 3.85667 20.824 3.51444 20.472C3.17148 20.1192 3 19.68 3 19.1543V6.84571C3 6.32 3.17148 5.88114 3.51444 5.52914C3.85667 5.17638 4.28333 5 4.79444 5H21.2056C21.7167 5 22.1433 5.17638 22.4856 5.52914C22.8285 5.88114 23 6.32 23 6.84571V19.1543C23 19.68 22.8289 20.1189 22.4867 20.4709C22.1437 20.8236 21.7167 21 21.2056 21H4.79444ZM13 13.1314L21.8889 7.15429L21.5467 6.14286L13 11.8571L4.45333 6.14286L4.11111 7.15429L13 13.1314Z" fill="#EC2383"/>
                    </svg>
                    <span>{{ __('E-mail') }}:</span>
                    {{ $user->email }}
                </div>
                <div>
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.44112 3.96178C9.14035 3.23525 8.34742 2.84854 7.58964 3.05557L4.15229 3.99302C3.47264 4.18052 3 4.79768 3 5.50077C3 15.1644 10.8356 23 20.4992 23C21.2023 23 21.8195 22.5274 22.007 21.8477L22.9444 18.4104C23.1515 17.6526 22.7648 16.8596 22.0382 16.5589L18.2884 14.9964C17.6517 14.7308 16.9134 14.9144 16.4799 15.4496L14.9018 17.3752C12.1519 16.0745 9.92548 13.8481 8.62475 11.0982L10.5504 9.52403C11.0856 9.08655 11.2692 8.35221 11.0036 7.71552L9.44112 3.96568V3.96178Z" fill="#EC2383"/>
                    </svg>
                    <span>{{ __('Телефон') }}:</span>
                    {{ $user->phone }}
                </div>
                <div class="dropdown">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.4375 17.875H3.65625H22.425H23.5625C24.05 17.875 24.375 17.55 24.375 17.0625C24.375 16.575 24.05 16.25 23.5625 16.25H22.75C22.5875 11.6188 19.4188 7.8 15.1938 6.74375C15.3563 6.41875 15.4375 6.09375 15.4375 5.6875C15.4375 4.30625 14.3813 3.25 13 3.25C11.6187 3.25 10.5625 4.30625 10.5625 5.6875C10.5625 6.09375 10.6438 6.41875 10.8063 6.74375C6.58125 7.8 3.4125 11.6188 3.25 16.25H2.4375C1.95 16.25 1.625 16.575 1.625 17.0625C1.625 17.55 1.95 17.875 2.4375 17.875Z" fill="#EC2383"/>
                            <path d="M4.46875 19.5L5.11875 20.7188C5.2 20.9625 5.525 21.125 5.85 21.125H20.2312C20.5562 21.125 20.8 20.9625 20.9625 20.7188L21.6125 19.5H4.46875Z" fill="#EC2383"/>
                        </svg>
                        <span>{{ __('Меню') }}</span>
                        {{ $user->menu->isCustom ? __($user->menu_name) : __($user->menu_file) }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#uploadModal"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.0052 14.667L6.42188 10.0837L7.70521 8.75449L10.0885 11.1378V3.66699H11.9219V11.1378L14.3052 8.75449L15.5885 10.0837L11.0052 14.667ZM5.50521 18.3337C5.00104 18.3337 4.56929 18.154 4.20996 17.7947C3.85063 17.4353 3.67127 17.0039 3.67188 16.5003V13.7503H5.50521V16.5003H16.5052V13.7503H18.3385V16.5003C18.3385 17.0045 18.1589 17.4362 17.7995 17.7956C17.4402 18.1549 17.0088 18.3343 16.5052 18.3337H5.50521Z" fill="#787E84"/>
                                </svg> {{ __('Загрузить другое меню') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            @if($user->firstQuiz)
                <div class="result-box">
                    <div class="result-row">
                        <p>{{ __('Параметры') }}:</p>
                        <ul>
                            <li><span>{{ __('Вес') }}:</span> {{ $user->firstQuiz->weight }} {{ __('кг') }};</li>
                            <li><span>{{ __('Рост') }}:</span> {{ $user->firstQuiz->height }} {{ __('см') }};</li>
                            <li><span>{{ __('Возраст') }}:</span> {{ $user->firstQuiz->age }} {{ __('лет') }};</li>
                        </ul>
                    </div>
                    <div class="result-row">
                        <p>{{ __('Цель') }}:</p>
                        <p>{{ $user->firstQuiz->target }}</p>
                    </div>
                    <div class="result-row">
                        <p>{{ __('Вариант меню') }}:</p>
                        <p>{{ $user->firstQuiz->menu }}</p>
                    </div>
                    <div class="result-row">
                        <p>{{ __('Прием лекарств или пищевых добавок') }}:</p>
                        <p>{{ $user->firstQuiz->nutritional_supplements }}</p>
                    </div>
                    <div class="result-row">
                        <p>{{ __('Были проблемы со здоровьем') }}:</p>
                        <p>{{ $user->firstQuiz->health_problems }}</p>
                    </div>
                    <div class="result-row">
                        <p>{{ __('Был частный тренер/личные тренировки/план питания?') }}</p>
                        <p>{{ $user->firstQuiz->experience }}</p>
                    </div>
                </div>
            @endif

            @if($resultStart)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>{{ __('Стартовые данные') }}</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 stat-start stat-start_member">
                            <div>
                                <p>{{ __('Вес') }}: <span>{{ $resultStart->weight }} кг</span></p>
                                <p>{{ __('Грудь') }}: <span>{{ $resultStart->breast }} см</span></p>
                                <p>{{ __('Талия') }}: <span>{{ $resultStart->waistline }} см</span></p>
                                <p>{{ __('Бедра') }}: <span>{{ $resultStart->hips }} см</span></p>
                                <p>{{ __('Правая рука') }}: <span>{{ $resultStart->hand }} см</span></p>
                                <p>{{ __('Правая нога') }}: <span>{{ $resultStart->leg }} см</span></p>
                                <p>{{ __('Рост') }}: <span>{{ $user->firstQuiz->height }} см</span></p>
                                <p>{{ __('Возраст') }}: <span>{{ $user->firstQuiz->age }} лет</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 stat-pics">
                            @if($resultStart->photo_1)
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_1) }}"><img src="{{ \Storage::url($resultStart->photo_1) }}" alt=""></a>
                            @else
                                <a class="stat-pic_empty">
                                    <span>{{ __('Фото еще') }}<br> {{ __('не загружено') }}</span>
                                </a>
                            @endif

                            @if($resultStart->photo_2)
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_2) }}"><img src="{{ \Storage::url($resultStart->photo_2) }}" alt=""></a>
                            @else
                                <a class="stat-pic_empty">
                                    <span>{{ __('Фото еще') }}<br> {{ __('не загружено') }}</span>
                                </a>
                            @endif

                            @if($resultStart->photo_3)
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_3) }}"><img src="{{ \Storage::url($resultStart->photo_3) }}" alt=""></a>
                            @else
                                <a class="stat-pic_empty">
                                    <span>{{ __('Фото еще') }}<br> {{ __('не загружено') }}</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif


            <div class="member-reports">
                <h2>Отчеты</h2>
                <ul class="nav nav-pills nav-fill justify-content-center" id="pills-week" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-week1-tab" data-bs-toggle="pill" data-bs-target="#pills-week1" type="button" role="tab" aria-controls="pills-week1" aria-selected="true">{{ __('Первая неделя') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-week2-tab" data-bs-toggle="pill" data-bs-target="#pills-week2" type="button" role="tab" aria-controls="pills-week2" aria-selected="false">{{ __('Вторая неделя') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-week3-tab" data-bs-toggle="pill" data-bs-target="#pills-week3" type="button" role="tab" aria-controls="pills-week3" aria-selected="false">{{ __('Третья неделя') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-week4-tab" data-bs-toggle="pill" data-bs-target="#pills-week4" type="button" role="tab" aria-controls="pills-week4" aria-selected="false">{{ __('Четвертая неделя') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-week5-tab" data-bs-toggle="pill" data-bs-target="#pills-week5" type="button" role="tab" aria-controls="pills-week5" aria-selected="false">{{ __('Пятая неделя') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-week6-tab" data-bs-toggle="pill" data-bs-target="#pills-week6" type="button" role="tab" aria-controls="pills-week6" aria-selected="false">{{ __('Шестая неделя') }}</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent_week">
                    <x-tab-week-for-trainer :week="$weeks['week1']" :user="$user" :title1="__('Результаты за первую неделю')" :title2="__('Параметры за первую неделю')"></x-tab-week-for-trainer>
                    <x-tab-week-for-trainer :week="$weeks['week2']" :user="$user" :title1="__('Результаты за вторую неделю')" :title2="__('Параметры за вторую неделю')"></x-tab-week-for-trainer>
                    <x-tab-week-for-trainer :week="$weeks['week3']" :user="$user" :title1="__('Результаты за третью неделю')" :title2="__('Параметры за третью неделю')"></x-tab-week-for-trainer>
                    <x-tab-week-for-trainer :week="$weeks['week4']" :user="$user" :title1="__('Результаты за четвертую неделю')" :title2="__('Параметры за четвертую неделю')"></x-tab-week-for-trainer>
                    <x-tab-week-for-trainer :week="$weeks['week5']" :user="$user" :title1="__('Результаты за пятую неделю')" :title2="__('Параметры за пятую неделю')"></x-tab-week-for-trainer>
                    <x-tab-week-for-trainer :week="$weeks['week6']" :user="$user" :title1="__('Результаты за шестую неделю')" :title2="__('Параметры за шестую неделю')"></x-tab-week-for-trainer>
                </div>
            </div>
        </div>
    </div>

    <!-- new stream modal  -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Загрузить другое меню') }}</div>
                    <form class="needs-validation settings-form" method="POST" action="{{ route("user.update.menu", ["user" => $user]) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("PUT")

                        <div class="form-item">
                            <label>{{ __('Название меню') }}</label>
                            <input name="menu_name" type="text" value="" class="form-control" required>
                            <div class="invalid-feedback">
                                {{ __('Введите название') }}
                            </div>
                        </div>
                        <div class="form-file form-item">
                            <label class="control-label">{{ __('Загрузить шаблон листа для старта') }}</label>
                            <input id="file-1" name="menu_file" type="file">
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('загрузить') }}</button>
                        </div>
                    </form>
                </div>
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
                    <div class="modal-title">{{ __('Меню загружено') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title mb-0">{{ __('Комментарий добавлен') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $('#file-1').fileinput({ // документация https://plugins.krajee.com/file-input/plugin-options
            showCaption: false,
            hideThumbnailContent: false,
            dropZoneEnabled: false,
            showPreview: true,
            showUploadedThumbs: true,
            showUpload: false,
            showZoom: false,
            browseLabel: 'Загрузить',
            browseClass: 'btn btn-green',
            removeLabel: 'Удалить',
            removeClass: 'd-none'
        });
    </script>
@endsection
