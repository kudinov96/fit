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
            @foreach($week["days"] as $day)
                <div class="check-row" data-row="15.03.24">
                    <div class="row">
                        <div class="col-2">
                            <span><em>{{ $day["date"] }}</em></span>
                        </div>
                        @if($day["items"]->count() > 0)
                            @foreach($day["items"] as $item)
                                <div class="col-2">{{ $item->training ? "Да" : "Нет" }}</div>
                                <div class="col-2">{{ $item->water }}</div>
                                <div class="col-2">{{ $item->sleep }}</div>
                                <div class="col-2">{{ $item->alcohol ? "Да" : "Нет" }}</div>
                                <div class="col-2">{{ $item->nutrition }}</div>
                            @endforeach
                        @else
                            <div class="col-10">
                                <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="15.03.24">Заполнить данные</a>
                            </div>
                        @endif
                    </div>
                    @if($day["items"]->count() > 0)
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
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-edit="14.03.24">Редактировать данные</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach
            {{--<div class="check-row">
                <div class="row">
                    <div class="col-2">
                        <span>Пн<em>, 14.03.24</em></span>
                    </div>
                    <div class="col-2">Да</div>
                    <div class="col-2">4</div>
                    <div class="col-2">8</div>
                    <div class="col-2">Нет</div>
                    <div class="col-2">Избыточное</div>
                </div>
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
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-edit="14.03.24">Редактировать данные</a>
                        </li>
                    </ul>
                </div>
            </div>--}}
            {{--<div class="check-row" data-row="15.03.24">
                <div class="row">
                    <div class="col-2">
                        <span>Вт<em>, 15.03.24</em></span>
                    </div>
                    <div class="col-2">Да</div>
                    <div class="col-2">4</div>
                    <div class="col-2">8</div>
                    <div class="col-2">Нет</div>
                    <div class="col-2">Избыточное</div>
                </div>
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
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-edit="14.03.24">Редактировать данные</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="check-row" data-row="16.03.24">
                <div class="row">
                    <div class="col-2">
                        <span>Ср<em>, 16.03.24</em></span>
                    </div>
                    <div class="col-2">Да</div>
                    <div class="col-2">4</div>
                    <div class="col-2">8</div>
                    <div class="col-2">Нет</div>
                    <div class="col-2">Избыточное</div>
                </div>
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
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-edit="14.03.24">Редактировать данные</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="check-row" data-row="17.03.24">
                <div class="row">
                    <div class="col-2">
                        <span>Чт<em>, 17.03.24</em></span>
                    </div>
                    <div class="col-2">Да</div>
                    <div class="col-2">4</div>
                    <div class="col-2">8</div>
                    <div class="col-2">Нет</div>
                    <div class="col-2">Избыточное</div>
                </div>
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
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-edit="14.03.24">Редактировать данные</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="check-row" data-row="18.03.24">
                <div class="row">
                    <div class="col-2">
                        <span>Пт<em>, 18.03.24</em></span>
                    </div>
                    <div class="col-2">Да</div>
                    <div class="col-2">4</div>
                    <div class="col-2">8</div>
                    <div class="col-2">Нет</div>
                    <div class="col-2">Избыточное</div>
                </div>
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
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-edit="14.03.24">Редактировать данные</a>
                        </li>
                    </ul>
                </div>
            </div>--}}
            {{--<div class="check-row" data-row="15.03.24">
                <div class="row">
                    <div class="col-2">
                        <span>Вт<em>, 15.03.24</em></span>
                    </div>
                    <div class="col-10">
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="15.03.24">Заполнить даные</a>
                    </div>
                </div>
            </div>--}}

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
        </div>
    </div>
</div>
