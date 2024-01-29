@props(["title", "id", "week", "resultTitle"])

<div class="accordion-item">
    <h2 class="accordion-header">
        <button @class(["accordion-button", "collapsed" => !$week["isCurrent"]]) type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $id }}" aria-expanded="false" aria-controls="flush-collapseOne">
            {{ $title }}
        </button>
    </h2>
    <div id="flush-collapse-{{ $id }}" @class(["accordion-collapse", "collapse", "show" => $week["isCurrent"]]) data-bs-parent="#accordionFlushExample">
        <div @class(["accordion-body", "report-send" => $week["result"]])>
            <div class="check-head">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2" data-label="Трен."><span>Тренировка</span></div>
                    <div class="col-2" data-label="Вода (л)"><span>Вода (л)</span></div>
                    <div class="col-2" data-label="Сон (ч)"><span>Сон (часов)</span></div>
                    <div class="col-2" data-label="Алк."><span>Алкоголь</span></div>
                    <div class="col-2" data-label="Питан."><span>Питание</span></div>
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
                        @else
                            <div class="col-10">
                                <a class="btn store-check-in-modal-btn" data-week="{{ $week["number"] }}"  data-day="{{ $key }}" data-bs-toggle="modal" data-bs-target="#storeCheckInModal">Заполнить данные</a>
                            </div>
                        @endif
                    </div>
                    @if($day["item"])
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
                                    >Редактировать данные</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach

            @if($week["result"])
                <div class="week-result_title"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="16" fill="#41BC22"/>
                        <path d="M22.1606 9.7207L13.6202 18.3665L10.0084 14.1604L7.61914 16.6035L13.4542 23.3986L24.381 12.3472L22.1606 9.7207Z" fill="white"/>
                    </svg> {{ $resultTitle }}</div>

                <div class="week-wrapper week-wrapper_flex">
                    <p>Вес: <span>{{ $week["result"]->weight }} кг</span></p>
                    <p>Грудь: <span>{{ $week["result"]->breast }} см</span></p>
                    <p>Талия: <span>{{ $week["result"]->waistline }} см</span></p>
                    <p>Бедра: <span>{{ $week["result"]->hips }} см</span></p>
                    <p>Правая рука: <span>{{ $week["result"]->hand }} см</span></p>
                    <p>Правая нога: <span>{{ $week["result"]->leg }} см</span></p>
                </div>

                @if($week["result"]->message_user || $week["result"]->message_admin)
                    <div class="week-wrapper">
                        <div class="week-title">Комментарии</div>
                        @if($week["result"]->message_user)
                            <div class="comment">
                                <div class="comment-name"><span>{{ auth()->user()->name }}</span> <em style="text-transform: lowercase; font-style: normal;">{{ $week["result"]->message_user_date->translatedFormat("d F H:i") }}</em></div>
                                <div class="comment-text">{{ $week["result"]->message_user }}</div>
                            </div>
                        @endif
                        @if($week["result"]->message_admin)
                            <div class="comment comment-answer">
                                <div class="comment-name"><span>{{ \App\Models\User::admin()->name }}</span> <em style="text-transform: lowercase; font-style: normal;">{{ $week["result"]->message_admin_date->translatedFormat("d F H:i") }}</em></div>
                                <div class="comment-text">{{ $week["result"]->message_admin }}</div>
                            </div>
                        @endif
                    </div>
                @endif
            @else
                <div class="check-sagatavot">
                    <a @class(["btn", "btn-disabled" => !$week["nowMoreFriday"]]) @if($week["nowMoreFriday"]) data-bs-toggle="modal" data-bs-target="#{{ $week["number"] === 6 ? "weekModal_six" : "weekModal" }}" data-week="{{ $week["number"] }}" @endif>{{ __("Sagatavot Check In") }}</a>
                </div>
            @endif
        </div>
    </div>
</div>
