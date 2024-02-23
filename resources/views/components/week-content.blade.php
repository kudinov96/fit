@props(["week", "isTrainerPage" => false])

<div class="week-content">
    <div class="check-head">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-2" data-label="{{ __('Трен.') }}"><span>{{ __('Тренировка') }}</span></div>
            <div class="col-2" data-label="{{ __('Вода (л)') }}"><span>{{ __('Вода (л)') }}</span></div>
            <div class="col-2" data-label="{{ __('Сон (ч)') }}"><span>{{ __('Сон (часов)') }}</span></div>
            <div class="col-2" data-label="{{ __('Алк.') }}"><span>{{ __('Алкоголь') }}</span></div>
            <div class="col-2" data-label="{{ __('Питан.') }}"><span>{{ __('Питание') }}</span></div>
        </div>
    </div>
    @foreach($week["days"] as $key => $day)
        <div class="check-row" data-row="15.03.24">
            <div class="row">
                <div class="col-2">
                    <span><em>{{ $day["date"] }}</em></span>
                </div>
                @if($day["item"])
                    <div class="col-2">{{ $day["item"]->training ? "Да" : "Нет" }}</div>
                    <div class="col-2">{{ $day["item"]->water }}</div>
                    <div class="col-2">{{ $day["item"]->sleep }}</div>
                    <div class="col-2">{{ $day["item"]->alcohol ? "Да" : "Нет" }}</div>
                    <div class="col-2">{{ $day["item"]->nutrition }}</div>
                @elseif(!$isTrainerPage)
                    <div class="col-10">
                        <a class="btn store-check-in-modal-btn" data-week="{{ $week["number"] }}"  data-day="{{ $key }}" data-bs-toggle="modal" data-bs-target="#storeCheckInModal">{{ __('Заполнить данные') }}</a>
                    </div>
                @endif
            </div>
            @if($day["item"] && !$isTrainerPage)
                <div class="form-item dropdown">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="7" height="31" viewBox="0 0 7 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3.5" cy="3.5" r="3.5" fill="white"/>
                            <circle cx="3.5" cy="15.5" r="3.5" fill="white"/>
                            <circle cx="3.5" cy="27.5" r="3.5" fill="white"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item update-check-in-modal-btn" data-bs-toggle="modal" data-bs-target="#editCheckInModal"
                               data-id="{{ $day["item"]->id }}"
                               data-week="{{ $week["number"] }}"
                               data-day="{{ $key }}"
                               data-training="{{ $day["item"]->training ? "1" : "0" }}"
                               data-water="{{ $day["item"]->water }}"
                               data-sleep="{{ $day["item"]->sleep }}"
                               data-alcohol="{{ $day["item"]->alcohol ? "1" : "0" }}"
                               data-nutrition="{{ $day["item"]->nutrition}}"
                            >{{ __('Редактировать данные') }}</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    @endforeach
</div>
