@extends("layouts.layout-3")

@section("title", "Check in")

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="text-center">Check in</h1>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <x-accordion-week-item :id="1" :title="'Первая неделя'" :week="$weeks['week1']"></x-accordion-week-item>
                {{--<div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Первая неделя
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body report-send">
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
                            <div class="check-row check-completed" data-row="14.03.24">
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
                            </div>
                            <div class="check-row" data-row="15.03.24">
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
                            </div>

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
                </div>--}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Вторая неделя
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                            <div class="check-row check-completed" data-row="14.03.24">
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
                            </div>
                            <div class="check-row check-completed" data-row="14.03.24">
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
                            </div>
                            <div class="check-row" data-row="15.03.24">
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
                            </div>
                            <div class="check-sagatavot">
                                <a data-bs-toggle="modal" data-bs-target="#weekModal" data-week="2" class="btn btn-disabled">Sagatavot Check In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Третья неделя
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                            <div class="check-row check-completed" data-row="14.03.24">
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
                            </div>
                            <div class="check-row" data-row="15.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Вт<em>, 15.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="15.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="16.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Ср<em>, 16.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="16.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="17.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Чт<em>, 17.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="17.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="18.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Пт<em>, 18.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="18.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-sagatavot">
                                <a data-bs-toggle="modal" data-bs-target="#weekModal" data-week="3" class="btn">Sagatavot Check In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Четвертая неделя
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                            <div class="check-row check-completed" data-row="14.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Пн<em>, 14.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="15.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="15.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Вт<em>, 15.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="15.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="16.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Ср<em>, 16.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="16.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="17.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Чт<em>, 17.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="17.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="18.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Пт<em>, 18.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="18.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-sagatavot">
                                <a data-bs-toggle="modal" data-bs-target="#weekModal" data-week="4" class="btn">Sagatavot Check In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            Пятая неделя
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                            <div class="check-row check-completed" data-row="14.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Пн<em>, 14.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="15.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="15.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Вт<em>, 15.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="15.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="16.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Ср<em>, 16.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="16.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="17.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Чт<em>, 17.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="17.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-row" data-row="18.03.24">
                                <div class="row">
                                    <div class="col-2">
                                        <span>Пт<em>, 18.03.24</em></span>
                                    </div>
                                    <div class="col-10">
                                        <a class="btn" data-bs-toggle="modal" data-bs-target="#reportModal" data-date="18.03.24">Заполнить даные</a>
                                    </div>
                                </div>
                            </div>
                            <div class="check-sagatavot">
                                <a data-bs-toggle="modal" data-bs-target="#weekModal" data-week="5" class="btn">Sagatavot Check In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                            Шестая неделя
                        </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                            <div class="check-row check-completed" data-row="14.03.24">
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
                            </div>
                            <div class="check-row" data-row="15.03.24">
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
                            </div>
                            <div class="check-sagatavot">
                                <a data-bs-toggle="modal" data-bs-target="#weekModal_six" data-week="6" class="btn">Sagatavot Check In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#foto-1, #foto-2, #foto-3').fileinput({ // документация https://plugins.krajee.com/file-input/plugin-options
                showCaption: false,
                hideThumbnailContent: false,
                dropZoneEnabled: false,
                showPreview: true,
                showUploadedThumbs: true,
                showUpload: false,
                showZoom: false,
                browseLabel: 'Загрузить фото',
                browseClass: 'btn-foto',
                removeLabel: 'Удалить',
                removeClass: 'd-none'
            }).on('fileuploaded', function(event, previewId, index, fileId) {

            });
        });
    </script>
@endsection
