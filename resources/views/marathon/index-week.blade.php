@extends("layouts.layout-3")

@section("title", __("План марафона"))

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="text-center">{{ __('План марафона') }}</h1>
            @if($currentWeek !== 0)
                <div class="days-nav d-none d-md-block">
                    <ul class="nav nav-pills nav-fill justify-content-center">
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => $week === 1 && $currentWeek >= 1, "disabled" => $currentWeek < 1]) aria-current="page" href="{{ route("marathon.index.week", ["week" => 1]) }}">{{ __('Первая неделя') }}</a>
                        </li>
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => $week === 2, "disabled" => $currentWeek < 2]) href="{{ $currentWeek >= 2 ? route("marathon.index.week", ["week" => 2]) : "#" }}">{{ __('Вторая неделя') }}</a>
                        </li>
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => $week === 3, "disabled" => $currentWeek < 3]) href="{{ $currentWeek >= 3 ? route("marathon.index.week", ["week" => 3]) : "#" }}">{{ __('Третья неделя') }}</a>
                        </li>
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => $week === 4, "disabled" => $currentWeek < 4]) href="{{ $currentWeek >= 4 ? route("marathon.index.week", ["week" => 4]) : "#" }}">{{ __('Четвертая неделя') }}</a>
                        </li>
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => $week === 5, "disabled" => $currentWeek < 5]) href="{{ $currentWeek >= 5 ? route("marathon.index.week", ["week" => 5]) : "#" }}">{{ __('Пятая неделя') }}</a>
                        </li>
                        <li class="nav-item">
                            <a @class(["nav-link", "active" => $week === 6, "disabled" => $currentWeek < 6]) href="{{ $currentWeek >= 6 ? route("marathon.index.week", ["week" => 6]) : "#" }}">{{ __('Шестая неделя') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="days-nav d-block d-md-none">
                    <div class="dropdown">
                        @php
                            $weekTitle = __('Первая неделя');
                            if ($week === 2) { $weekTitle = __('Вторая неделя'); }
                            elseif ($week === 3) { $weekTitle = __('Третья неделя'); }
                            elseif ($week === 4) { $weekTitle = __('Четвертая неделя'); }
                            elseif ($week === 5) { $weekTitle = __('Пятая неделя'); }
                            elseif ($week === 6) { $weekTitle = __('Шестая неделя'); }
                        @endphp
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $weekTitle }}
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a @class(["dropdown-item", "active" => $week === 1 && $currentWeek >= 1, "disabled" => $currentWeek < 1]) aria-current="page" href="{{ route("marathon.index.week", ["week" => 1]) }}">{{ __('Первая неделя') }}</a>
                            </li>
                            <li>
                                <a @class(["dropdown-item", "active" => $week === 2, "disabled" => $currentWeek < 2]) href="{{ $currentWeek >= 2 ? route("marathon.index.week", ["week" => 2]) : "#" }}">{{ __('Вторая неделя') }}</a>
                            </li>
                            <li>
                                <a @class(["dropdown-item", "active" => $week === 3, "disabled" => $currentWeek < 3]) href="{{ $currentWeek >= 3 ? route("marathon.index.week", ["week" => 3]) : "#" }}">{{ __('Третья неделя') }}</a>
                            </li>
                            <li>
                                <a @class(["dropdown-item", "active" => $week === 4, "disabled" => $currentWeek < 4]) href="{{ $currentWeek >= 4 ? route("marathon.index.week", ["week" => 4]) : "#" }}">{{ __('Четвертая неделя') }}</a>
                            </li>
                            <li>
                                <a @class(["dropdown-item", "active" => $week === 5, "disabled" => $currentWeek < 5]) href="{{ $currentWeek >= 5 ? route("marathon.index.week", ["week" => 5]) : "#" }}">{{ __('Пятая неделя') }}</a>
                            </li>
                            <li>
                                <a @class(["dropdown-item", "active" => $week === 6, "disabled" => $currentWeek < 6]) href="{{ $currentWeek >= 6 ? route("marathon.index.week", ["week" => 6]) : "#" }}">{{ __('Шестая неделя') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
            <div class="plan-wrapper">
                @if($currentWeek === 0)
                    <div class="plan-noty" style="margin-bottom: 0;">
                        <h3>{{ __('Марафон еще не начался') }}</h3>
                        <p>{{ __('Дата начала марафона:') . " " .  auth()->user()->stream->start_date->format("d.m.Y") }}</p>
                    </div>
                @endif
                @if($currentWeek !== 0)
                    <div class="plan-noty">
                        @if($stream->access_to_gym)
                            <h3>{{ __('Выполнение тренировок в зале') }}</h3>
                            <p>{{ __("plan_gym_week_$week") }}</p>
                        @endif
                        @if($stream->access_to_home)
                            <h3>{{ __('Выполнение тренировок дома') }}</h3>
                            <p>{{ __("plan_home_week_$week") }}</p>
                        @endif
                    </div>
                @endif

                @if($currentWeek !== 0)
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        @if($stream->access_to_home)
                            <li class="nav-item" role="presentation">
                                <button @class(["nav-link", "active" => $stream->access_to_home]) id="pills-tab1-tab" data-bs-toggle="pill" data-bs-target="#pills-tab1" type="button" role="tab" aria-controls="pills-tab1" aria-selected="true">{{ __('Тренировка дома') }}</button>
                            </li>
                        @endif
                        @if($stream->access_to_gym)
                            <li class="nav-item" role="presentation">
                                <button @class(["nav-link", "active" => $stream->access_to_gym && !$stream->access_to_home]) id="pills-tab2-tab" data-bs-toggle="pill" data-bs-target="#pills-tab2" type="button" role="tab" aria-controls="pills-tab2" aria-selected="false">{{ __('Тренировка в зале') }}</button>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                            <div @class(["tab-pane", "fade",
"show" => $stream->access_to_home,
 "active" => $stream->access_to_home]) id="pills-tab1" role="tabpanel" aria-labelledby="pills-tab1-tab" tabindex="0">
                            <ul class="nav nav-pills pills_inner" id="pills-tab_type1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-type1_day1-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day1" type="button" role="tab" aria-controls="pills-type1_day1" aria-selected="true">{{ __('1-ый день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type1_day2-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day2" type="button" role="tab" aria-controls="pills-type1_day2" aria-selected="false">{{ __('2-ой день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type1_day3-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day3" type="button" role="tab" aria-controls="pills-type1_day3" aria-selected="false">{{ __('3-ий день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type1_day4-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day4" type="button" role="tab" aria-controls="pills-type1_day4" aria-selected="false">{{ __('4-ый день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type1_day5-tab" data-bs-toggle="pill" data-bs-target="#pills-type1_day5" type="button" role="tab" aria-controls="pills-type1_day5" aria-selected="false">{{ __('5-ый день') }}</button>
                                </li>
                            </ul>
                            <div class="tab-content tab-content_inner" id="pills-tabContent_type1">
                                <div class="tab-pane fade show active" id="pills-type1_day1" role="tabpanel" aria-labelledby="pills-type1_day1-tab" tabindex="0">
                                    <div class="day-name">{{ __('day1_name_home') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsHome["day1"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type1_day2" role="tabpanel" aria-labelledby="pills-type1_day2-tab" tabindex="0">
                                    <div class="day-name">{{ __('day2_name_home') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsHome["day2"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type1_day3" role="tabpanel" aria-labelledby="pills-type1_day3-tab" tabindex="0">
                                    <div class="day-name">{{ __('day3_name_home') }}</div>
                                    <div class="my-way">
                                        <p><span>{{ __('additional-day-comment1') }}</span> {{ __('additional-day-comment2') }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type1_day4" role="tabpanel" aria-labelledby="pills-type1_day4-tab" tabindex="0">
                                    <div class="day-name">{{ __('day4_name_home') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsHome["day4"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type1_day5" role="tabpanel" aria-labelledby="pills-type1_day5-tab" tabindex="0">
                                    <div class="day-name">{{ __('day5_name_home') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsHome["day5"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div @class(["tab-pane", "fade",
"show" => $stream->access_to_gym && !$stream->access_to_home,
 "active" => $stream->access_to_gym && !$stream->access_to_home]) id="pills-tab2" role="tabpanel" aria-labelledby="pills-tab2-tab" tabindex="0">
                            <ul class="nav nav-pills pills_inner" id="pills-tab_type2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-type2_day1-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day1" type="button" role="tab" aria-controls="pills-type2_day1" aria-selected="true">{{ __('1-ый день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type2_day2-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day2" type="button" role="tab" aria-controls="pills-type2_day2" aria-selected="false">{{ __('2-ой день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type2_day3-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day3" type="button" role="tab" aria-controls="pills-type2_day3" aria-selected="false">{{ __('3-ий день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type2_day4-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day4" type="button" role="tab" aria-controls="pills-type2_day4" aria-selected="false">{{ __('4-ый день') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-type2_day5-tab" data-bs-toggle="pill" data-bs-target="#pills-type2_day5" type="button" role="tab" aria-controls="pills-type2_day5" aria-selected="false">{{ __('5-ый день') }}</button>
                                </li>
                            </ul>
                            <div class="tab-content tab-content_inner" id="pills-tabContent_type2">
                                <div class="tab-pane fade show active" id="pills-type2_day1" role="tabpanel" aria-labelledby="pills-type2_day1-tab" tabindex="0">
                                    <div class="day-name">{{ __('day1_name_gym') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsGym["day1"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type2_day2" role="tabpanel" aria-labelledby="pills-type2_day2-tab" tabindex="0">
                                    <div class="day-name">{{ __('day2_name_gym') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsGym["day2"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type2_day3" role="tabpanel" aria-labelledby="pills-type2_day3-tab" tabindex="0">
                                    <div class="day-name">{{ __('day3_name_gym') }}</div>
                                    <div class="my-way">
                                        <p><span>{{ __('additional-day-comment1') }}</span> {{ __('additional-day-comment2') }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type2_day4" role="tabpanel" aria-labelledby="pills-type2_day4-tab" tabindex="0">
                                    <div class="day-name">{{ __('day4_name_gym') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsGym["day4"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-type2_day5" role="tabpanel" aria-labelledby="pills-type2_day5-tab" tabindex="0">
                                    <div class="day-name">{{ __('day5_name_gym') }}</div>
                                    <div class="video-list row">
                                        @foreach($trainingsGym["day5"] as $item)
                                            <x-video-item :item="$item"></x-video-item>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="check-in_link">
                        <a href="{{ route("check-in.index") }}" class="btn">{{ __('Отправить Check In') }}</a>
                    </div>--}}
                @endif
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
                    <div class="modal-title">{{ auth()->user()->name }}, {{ __("поздравляем!") }}</div>
                    <div class="modal-desc text-center">
                        <p>{{ __("start-data-submited-message") }}</p>
                        <p>{{ __("lets-start-message") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
