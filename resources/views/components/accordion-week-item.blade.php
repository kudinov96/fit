@props(["title", "id", "week"])

<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $id }}" aria-expanded="false" aria-controls="flush-collapseOne">
            {{ $title }}
        </button>
    </h2>
    <div id="flush-collapse-{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div @class(["accordion-body", "report-send" => $week["reportHasBeenSent"]])>
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

            @if($week["reportHasBeenSent"])
                <div class="week-result_title"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="16" fill="#41BC22"/>
                        <path d="M22.1606 9.7207L13.6202 18.3665L10.0084 14.1604L7.61914 16.6035L13.4542 23.3986L24.381 12.3472L22.1606 9.7207Z" fill="white"/>
                    </svg> Результаты первой недели</div>

                <div class="week-wrapper week-wrapper_flex">
                    <p>Вес: <span>57 кг</span></p>
                    <p>Грудь: <span>80 см</span></p>
                    <p>Талия: <span>68 см</span></p>
                    <p>Бедра: <span>90 см</span></p>
                    <p>Правая рука: <span>50 см</span></p>
                    <p>Правая нога: <span>65 см</span></p>
                </div>

                <div class="week-wrapper">
                    <div class="week-title">Комментарии</div>
                    <div class="comment">
                        <div class="comment-name"><span>Виктория Пропоба</span> 23 декабря 13:30</div>
                        <div class="comment-text">Как часто нужно менять упражнения и тренировки, чтобы организм не привыкал и был результат? Что нельзя делать до и после тренировок? Какой частоты тренировок в неделю нужно придерживаться в идеале? И каков необходимый минимум, чтобы, несмотря ни на что, все-таки увидеть положительный эффект от занятий?</div>
                    </div>
                    <div class="comment comment-answer">
                        <div class="comment-name"><span>Патриция FitQoeen</span> 23 декабря 13:30</div>
                        <div class="comment-text">Как часто нужно менять упражнения и тренировки, чтобы организм не привыкал и был результат? Что нельзя делать до и после тренировок? Какой частоты тренировок в неделю нужно придерживаться в идеале? И каков необходимый минимум, чтобы, несмотря ни на что, все-таки увидеть положительный эффект от занятий?</div>
                    </div>
                </div>
            @else
                <div class="check-sagatavot">
                    <a @class(["btn", "btn-disabled" => !$week["nowMoreFriday"]]) data-bs-toggle="modal" data-bs-target="#weekModal" data-week="{{ $week["number"] }}">Sagatavot Check In</a>
                </div>
            @endif
        </div>
    </div>
</div>
