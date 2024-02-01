@extends("layouts.layout-3")

@section("title", __("План марафона"))

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="text-center">План марафона</h1>
            <div class="days-nav d-none d-md-block">
                <ul class="nav nav-pills nav-fill justify-content-center">
                    <li class="nav-item">
                        <a @class(["nav-link", "active" => $week === 1]) aria-current="page" href="{{ route("marathon.index.week", ["week" => 1]) }}">Первая неделя</a>
                    </li>
                    <li class="nav-item">
                        <a @class(["nav-link", "active" => $week === 2, "disabled" => $currentWeek < 2]) href="{{ $currentWeek >= 2 ? route("marathon.index.week", ["week" => 2]) : "#" }}">Вторая неделя</a>
                    </li>
                    <li class="nav-item">
                        <a @class(["nav-link", "active" => $week === 3, "disabled" => $currentWeek < 3]) href="{{ $currentWeek >= 3 ? route("marathon.index.week", ["week" => 3]) : "#" }}">Третья неделя</a>
                    </li>
                    <li class="nav-item">
                        <a @class(["nav-link", "active" => $week === 4, "disabled" => $currentWeek < 4]) href="{{ $currentWeek >= 4 ? route("marathon.index.week", ["week" => 4]) : "#" }}">Четвертая неделя</a>
                    </li>
                    <li class="nav-item">
                        <a @class(["nav-link", "active" => $week === 5, "disabled" => $currentWeek < 5]) href="{{ $currentWeek >= 5 ? route("marathon.index.week", ["week" => 5]) : "#" }}">Пятая неделя</a>
                    </li>
                    <li class="nav-item">
                        <a @class(["nav-link", "active" => $week === 6, "disabled" => $currentWeek < 6]) href="{{ $currentWeek >= 6 ? route("marathon.index.week", ["week" => 6]) : "#" }}">Шестая неделя</a>
                    </li>
                </ul>
            </div>
            <div class="days-nav d-block d-md-none">
                <div class="dropdown">
                    @php
                        $weekTitle = __('Первая');
                        if ($week === 2) { $weekTitle = __('Вторая'); }
                        elseif ($week === 3) { $weekTitle = __('Третья'); }
                        elseif ($week === 4) { $weekTitle = __('Четвертая'); }
                        elseif ($week === 5) { $weekTitle = __('Пятая'); }
                        elseif ($week === 6) { $weekTitle = __('Шестая'); }
                    @endphp
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $weekTitle }} {{ __('неделя') }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a @class(["dropdown-item", "active" => $week === 1]) aria-current="page" href="{{ route("marathon.index.week", ["week" => 1]) }}">Первая неделя</a>
                        </li>
                        <li>
                            <a @class(["dropdown-item", "active" => $week === 2, "disabled" => $currentWeek < 2]) href="{{ $currentWeek >= 2 ? route("marathon.index.week", ["week" => 2]) : "#" }}">Вторая неделя</a>
                        </li>
                        <li>
                            <a @class(["dropdown-item", "active" => $week === 3, "disabled" => $currentWeek < 3]) href="{{ $currentWeek >= 3 ? route("marathon.index.week", ["week" => 3]) : "#" }}">Третья неделя</a>
                        </li>
                        <li>
                            <a @class(["dropdown-item", "active" => $week === 4, "disabled" => $currentWeek < 4]) href="{{ $currentWeek >= 4 ? route("marathon.index.week", ["week" => 4]) : "#" }}">Четвертая неделя</a>
                        </li>
                        <li>
                            <a @class(["dropdown-item", "active" => $week === 5, "disabled" => $currentWeek < 5]) href="{{ $currentWeek >= 5 ? route("marathon.index.week", ["week" => 5]) : "#" }}">Пятая неделя</a>
                        </li>
                        <li>
                            <a @class(["dropdown-item", "active" => $week === 6, "disabled" => $currentWeek < 6]) href="{{ $currentWeek >= 6 ? route("marathon.index.week", ["week" => 6]) : "#" }}">Шестая неделя</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="plan-wrapper">
                @if($week === 1)
                    <div class="plan-noty">
                        <h3>Выполнение тренировок</h3>
                        <p>Так как это первые две недели и к нагрузке нужно привыкнуть, поэтому количество подходов в основном будет по два/три раза. Количество повторений 15-20.</p>
                        <p>Первые две недели предназначены для тренировки выносливости, поэтому повторений/репитов будет много. Если у вас есть опыт и вы уже занимаетесь спортом какое-то время, тогда, начиная со второй недели, вы можете выполнять этот план, используя 10-12 повторений и 3-4 подхода.</p>
                        <p>Но будьте осторожны – выбирайте подходящий для вас рабочий вес. Обратите внимание, что необходимо выполнять в супер-сете (одинаковые буквы), а что по отдельности.</p>
                    </div>
                @endif

                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-tab1-tab" data-bs-toggle="pill" data-bs-target="#pills-tab1" type="button" role="tab" aria-controls="pills-tab1" aria-selected="true">Тренировка дома</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tab2-tab" data-bs-toggle="pill" data-bs-target="#pills-tab2" type="button" role="tab" aria-controls="pills-tab2" aria-selected="false">Тренировка в зале</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-tab1" role="tabpanel" aria-labelledby="pills-tab1-tab" tabindex="0">
                        <ul class="nav nav-pills pills_inner" id="pills-tab_type1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-type1_day1-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day1" type="button" role="tab" aria-controls="pills-type1_day1" aria-selected="true">1-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type1_day2-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day2" type="button" role="tab" aria-controls="pills-type1_day2" aria-selected="false">2-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type1_day3-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day3" type="button" role="tab" aria-controls="pills-type1_day3" aria-selected="false">3-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type1_day4-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day4" type="button" role="tab" aria-controls="pills-type1_day4" aria-selected="false">4-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type1_day5-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day5" type="button" role="tab" aria-controls="pills-type1_day5" aria-selected="false">5-ый день</button>
                            </li>
                        </ul>
                        <div class="tab-content tab-content_inner" id="pills-tabContent_type1">
                            <div class="tab-pane fade show active" id="pills-type1_day1" role="tabpanel" aria-labelledby="pills-type1_day1-tab" tabindex="0">
                                <div class="day-name">1. ДЕНЬ - FULL BODY</div>
                                <div class="video-list row">
                                    @foreach($trainingsHome["day1"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type1_day2" role="tabpanel" aria-labelledby="pills-type1_day2-tab" tabindex="0">
                                <div class="day-name">2. ДЕНЬ - Leg day</div>
                                <div class="video-list row">
                                    @foreach($trainingsHome["day2"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type1_day3" role="tabpanel" aria-labelledby="pills-type1_day3-tab" tabindex="0">
                                <div class="day-name">3 ДЕНЬ. MY DAY MY WAY/ АКТИВНЫЙ ОТДЫХ</div>
                                <div class="my-way">
                                    <p><span>Твой дополнительный ДЕНЬ.</span> Можешь отдыхать, можешь заняться спортом. Рекомендую совмещать кардио с упражнениями на пресс. 40-60 мин. любой кардио тренажер + 150/200 качаний пресса.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type1_day4" role="tabpanel" aria-labelledby="pills-type1_day4-tab" tabindex="0">
                                <div class="day-name">4. ДЕНЬ - Upper body</div>
                                <div class="video-list row">
                                    @foreach($trainingsHome["day4"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type1_day5" role="tabpanel" aria-labelledby="pills-type1_day5-tab" tabindex="0">
                                <div class="day-name">5. ДЕНЬ - Booty day</div>
                                <div class="video-list row">
                                    @foreach($trainingsHome["day5"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-tab2" role="tabpanel" aria-labelledby="pills-tab2-tab" tabindex="0">
                        <ul class="nav nav-pills pills_inner" id="pills-tab_type2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-type2_day1-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day1" type="button" role="tab" aria-controls="pills-type2_day1" aria-selected="true">1-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type2_day2-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day2" type="button" role="tab" aria-controls="pills-type2_day2" aria-selected="false">2-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type2_day3-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day3" type="button" role="tab" aria-controls="pills-type2_day3" aria-selected="false">3-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type2_day4-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day4" type="button" role="tab" aria-controls="pills-type2_day4" aria-selected="false">4-ый день</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-type2_day5-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day5" type="button" role="tab" aria-controls="pills-type2_day5" aria-selected="false">5-ый день</button>
                            </li>
                        </ul>
                        <div class="tab-content tab-content_inner" id="pills-tabContent_type2">
                            <div class="tab-pane fade show active" id="pills-type2_day1" role="tabpanel" aria-labelledby="pills-type2_day1-tab" tabindex="0">
                                <div class="day-name">1. ДЕНЬ - FULL BODY</div>
                                <div class="video-list row">
                                    @foreach($trainingsGym["day1"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type2_day2" role="tabpanel" aria-labelledby="pills-type2_day2-tab" tabindex="0">
                                <div class="day-name">2. ДЕНЬ - Leg day</div>
                                <div class="video-list row">
                                    @foreach($trainingsGym["day2"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type2_day3" role="tabpanel" aria-labelledby="pills-type2_day3-tab" tabindex="0">
                                <div class="day-name">3 ДЕНЬ. MY DAY MY WAY/ АКТИВНЫЙ ОТДЫХ</div>
                                <div class="my-way">
                                    <p><span>Твой дополнительный ДЕНЬ.</span> Можешь отдыхать, можешь заняться спортом. Рекомендую совмещать кардио с упражнениями на пресс. 40-60 мин. любой кардио тренажер + 150/200 качаний пресса.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type2_day4" role="tabpanel" aria-labelledby="pills-type2_day4-tab" tabindex="0">
                                <div class="day-name">4. ДЕНЬ - Upper body</div>
                                <div class="video-list row">
                                    @foreach($trainingsGym["day4"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-type2_day5" role="tabpanel" aria-labelledby="pills-type2_day5-tab" tabindex="0">
                                <div class="day-name">5. ДЕНЬ - Booty day</div>
                                <div class="video-list row">
                                    @foreach($trainingsGym["day5"] as $item)
                                        <x-video-item :item="$item"></x-video-item>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="check-in_link">
                    <a href="{{ route("check-in.index") }}" class="btn">отправить Check In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- description modal  -->
    <div class="modal description-modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

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
                    <div class="modal-title">{{ auth()->user()->name }}, {{ __("поздравляю!") }}</div>
                    <div class="modal-desc text-center">
                        <p>{{ __("Твои стартовые данные успешно загружены и теперь будут храниться в разделе “Мои результаты”, ты всегда сможешь посмотреть с чего начала и сравнить результат :)") }}</p>
                        <p>{{ __("А теперь давай приступим к твоему преображению!") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
