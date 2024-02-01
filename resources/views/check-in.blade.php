@extends("layouts.layout-3")

@section("title", "Check in")

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="text-center">Check in</h1>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <x-accordion-week-item :id="1" :title="__('Первая неделя')" :resultTitle="__('Результаты первой недели')" :week="$weeks['week1']"></x-accordion-week-item>
                <x-accordion-week-item :id="2" :title="__('Вторая неделя')" :resultTitle="__('Результаты второй недели')" :week="$weeks['week2']"></x-accordion-week-item>
                <x-accordion-week-item :id="3" :title="__('Третья неделя')" :resultTitle="__('Результаты третьей недели')" :week="$weeks['week3']"></x-accordion-week-item>
                <x-accordion-week-item :id="4" :title="__('Четвертая неделя')" :resultTitle="__('Результаты четвертой недели')" :week="$weeks['week4']"></x-accordion-week-item>
                <x-accordion-week-item :id="5" :title="__('Пятая неделя')" :resultTitle="__('Результаты пятой недели')" :week="$weeks['week5']"></x-accordion-week-item>
                <x-accordion-week-item :id="6" :title="__('Шестая неделя')" :resultTitle="__('Результаты шестой недели')" :week="$weeks['week6']"></x-accordion-week-item>
            </div>
        </div>
    </div>

    <!-- storeCheckInModal  -->
    <div class="modal modal-report fade" id="storeCheckInModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Отчёт за день</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="need-validation settings-form" method="POST" action="{{ route("check-in.store") }}" novalidate>
                        @csrf
                        @method("POST")

                        <input type="hidden" name="week">
                        <input type="hidden" name="day">

                        <div class="qs-inputs row">
                            <div class="col-lg-3">
                                <label>Тренировка <span>(да/нет)</span></label>
                                <select name="training" class="form-control form-select">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Вода <span>(л)</span></label>
                                <input name="water" type="number" step="0.5" min="0" value="" class="form-control" tabindex="0" required>
                            </div>
                            <div class="col-lg-3">
                                <label>Сон <span>(часов)</span></label>
                                <input name="sleep" type="number" step="0.5" min="0" value="" class="form-control" tabindex="0" required>
                            </div>
                            <div class="col-lg-3">
                                <label>Алкоголь <span>(да/нет)</span></label>
                                <select name="alcohol" class="form-control form-select">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <label>Питание <span>(избыточное/норма/недостаточное)</span></label>
                                <select name="nutrition" class="form-control form-select">
                                    <option value="Норма">Норма</option>
                                    <option value="Избыточное">Избыточное</option>
                                    <option value="Недостаточное">Недостаточное</option>
                                </select>
                            </div>
                        </div>
                        <div class="report-action">
                            <button type="submit" class="btn">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- editCheckInModal  -->
    <div class="modal modal-report fade" id="editCheckInModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Отчёт за день</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="need-validation settings-form" method="POST" action="{{ route("check-in.update") }}" novalidate>
                        @csrf
                        @method("PUT")

                        <input type="hidden" name="check_in_id">
                        <input type="hidden" name="week">
                        <input type="hidden" name="day">

                        <div class="qs-inputs row">
                            <div class="col-lg-3">
                                <label>Тренировка <span>(да/нет)</span></label>
                                <select name="training" class="form-control form-select">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Вода <span>(л)</span></label>
                                <input name="water" type="number" step="0.5" min="0" value="" class="form-control" tabindex="0" required>
                            </div>
                            <div class="col-lg-3">
                                <label>Сон <span>(часов)</span></label>
                                <input name="sleep" type="number" step="0.5" min="0" value="" class="form-control" tabindex="0" required>
                            </div>
                            <div class="col-lg-3">
                                <label>Алкоголь <span>(да/нет)</span></label>
                                <select name="alcohol" class="form-control form-select">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <label>Питание <span>(избыточное/норма/недостаточное)</span></label>
                                <select name="nutrition" class="form-control form-select">
                                    <option value="Норма">Норма</option>
                                    <option value="Избыточное">Избыточное</option>
                                    <option value="Недостаточное">Недостаточное</option>
                                </select>
                            </div>
                        </div>
                        <div class="report-action">
                            <button type="submit" class="btn">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- week report modal -->
    <div class="modal modal-report fade" id="weekModal" tabindex="-1" aria-labelledby="weekModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Недельный Check in</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="weekForm" class="needs-validation settings-form" method="POST" action="{{ route("result.store") }}" novalidate>
                        @csrf
                        @method("POST")

                        <input type="hidden" name="type">

                        <div class="week-slider">
                            <div>
                                <div class="report-form_title">Заполни свои параметры в конце недели:</div>
                                <div class="qs-inputs row mb-4">
                                    <div class="col-xl-2">
                                        <label>Вес <span>(кг)</span></label>
                                        <input name="weight" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Грудь <span>(см)</span></label>
                                        <input name="breast" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Талия <span>(см)</span></label>
                                        <input name="waistline" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Бедра <span>(см)</span></label>
                                        <input name="hips" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Правая рука <span>(см)</span></label>
                                        <input name="hand" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Правая нога <span>(см)</span></label>
                                        <input name="leg" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="week-nav">
                                    <div></div>
                                    <div><a class="week-nav_next week-nav_next_1 btn">Далее</a></div>
                                </div>
                            </div>
                            <div>
                                <div class="report-form_title">Ты можешь написать комментарий или задать мне вопрос <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Это не обязательное поле" data-bs-custom-class="white-tooltip"
                                    ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 17H13V11H11V17ZM12 9C12.2833 9 12.521 8.904 12.713 8.712C12.905 8.52 13.0007 8.28267 13 8C13 7.71667 12.904 7.47933 12.712 7.288C12.52 7.09667 12.2827 7.00067 12 7C11.7167 7 11.4793 7.096 11.288 7.288C11.0967 7.48 11.0007 7.71733 11 8C11 8.28333 11.096 8.521 11.288 8.713C11.48 8.905 11.7173 9.00067 12 9ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6867 5.825 19.9743 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26333 14.6833 2.00067 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31333 6.88333 4.02567 5.825 4.925 4.925C5.825 4.025 6.88333 3.31267 8.1 2.788C9.31667 2.26333 10.6167 2.00067 12 2C13.3833 2 14.6833 2.26267 15.9 2.788C17.1167 3.31333 18.175 4.02567 19.075 4.925C19.975 5.825 20.6877 6.88333 21.213 8.1C21.7383 9.31667 22.0007 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6867 17.1167 19.9743 18.175 19.075 19.075C18.175 19.975 17.1167 20.6877 15.9 21.213C14.6833 21.7383 13.3833 22.0007 12 22ZM12 20C14.2333 20 16.125 19.225 17.675 17.675C19.225 16.125 20 14.2333 20 12C20 9.76667 19.225 7.875 17.675 6.325C16.125 4.775 14.2333 4 12 4C9.76667 4 7.875 4.775 6.325 6.325C4.775 7.875 4 9.76667 4 12C4 14.2333 4.775 16.125 6.325 17.675C7.875 19.225 9.76667 20 12 20Z" fill="#EC2383"/>
                                        </svg></a></div>
                                <div class="qs-inputs row">
                                    <div class="col-12">
                                        <label>Напиши тут</label>
                                        <textarea name="message_user" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="week-nav">
                                    <div><a class="week-nav_prev btn btn-back">Назад</a></div>
                                    <button type="submit" class="btn">Iesniegt Check In</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- week modal last day -->
    <div class="modal modal-report fade" id="weekModal_six" tabindex="-1" aria-labelledby="weekModal_sixLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Недельный Check in</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="weekForm_six" class="needs-validation settings-form" method="POST" action="{{ route("result.store") }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method("POST")

                        <input type="hidden" name="type" value="{{ \App\Enums\ResultTypeEnum::WEEK_6->value }}">

                        <div class="week-slider_six">
                            <div>
                                <div class="report-form_title">Заполни свои параметры в конце недели:</div>
                                <div class="qs-inputs row mb-4">
                                    <div class="col-xl-2">
                                        <label>Вес <span>(кг)</span></label>
                                        <input name="weight" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Грудь <span>(см)</span></label>
                                        <input name="breast" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Талия <span>(см)</span></label>
                                        <input name="waistline" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Бедра <span>(см)</span></label>
                                        <input name="hips" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Правая рука <span>(см)</span></label>
                                        <input name="hand" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <label>Правая нога <span>(см)</span></label>
                                        <input name="leg" type="number" step="0.01" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="week-nav">
                                    <div></div>
                                    <div><a class="week-nav_next week-nav_next_six btn">Далее</a></div>
                                </div>
                            </div>
                            <div>
                                <div class="report-form_title">Ты можешь написать комментарий или задать мне вопрос <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Это не обязательное поле" data-bs-custom-class="white-tooltip"
                                    ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 17H13V11H11V17ZM12 9C12.2833 9 12.521 8.904 12.713 8.712C12.905 8.52 13.0007 8.28267 13 8C13 7.71667 12.904 7.47933 12.712 7.288C12.52 7.09667 12.2827 7.00067 12 7C11.7167 7 11.4793 7.096 11.288 7.288C11.0967 7.48 11.0007 7.71733 11 8C11 8.28333 11.096 8.521 11.288 8.713C11.48 8.905 11.7173 9.00067 12 9ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6867 5.825 19.9743 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26333 14.6833 2.00067 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31333 6.88333 4.02567 5.825 4.925 4.925C5.825 4.025 6.88333 3.31267 8.1 2.788C9.31667 2.26333 10.6167 2.00067 12 2C13.3833 2 14.6833 2.26267 15.9 2.788C17.1167 3.31333 18.175 4.02567 19.075 4.925C19.975 5.825 20.6877 6.88333 21.213 8.1C21.7383 9.31667 22.0007 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6867 17.1167 19.9743 18.175 19.075 19.075C18.175 19.975 17.1167 20.6877 15.9 21.213C14.6833 21.7383 13.3833 22.0007 12 22ZM12 20C14.2333 20 16.125 19.225 17.675 17.675C19.225 16.125 20 14.2333 20 12C20 9.76667 19.225 7.875 17.675 6.325C16.125 4.775 14.2333 4 12 4C9.76667 4 7.875 4.775 6.325 6.325C4.775 7.875 4 9.76667 4 12C4 14.2333 4.775 16.125 6.325 17.675C7.875 19.225 9.76667 20 12 20Z" fill="#EC2383"/>
                                        </svg></a></div>
                                <div class="qs-inputs row">
                                    <div class="col-12">
                                        <label>Напиши тут</label>
                                        <textarea name="message_user" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="week-nav">
                                    <div><a class="week-nav_prev_six btn btn-back">Назад</a></div>
                                    <div><a class="week-nav_next week-nav_next_six btn">Далее</a></div>
                                </div>
                            </div>
                            <div>
                                <div class="report-form_title report-form_title_2 text-center">Загрузи свои финальные фото с нашим шаблоном для участия в розыгрыше</div>
                                <div class="report-form_subtitle"><a href="{{ \Storage::url($stream->template_for_finish) }}" download>Скачать шаблон <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0007 13.334L5.83399 9.16732L7.00065 7.95898L9.16732 10.1257V3.33398H10.834V10.1257L13.0007 7.95898L14.1673 9.16732L10.0007 13.334ZM5.00065 16.6673C4.54232 16.6673 4.14982 16.504 3.82315 16.1773C3.49649 15.8507 3.33343 15.4584 3.33399 15.0007V12.5007H5.00065V15.0007H15.0007V12.5007H16.6673V15.0007C16.6673 15.459 16.504 15.8515 16.1773 16.1782C15.8507 16.5048 15.4584 16.6679 15.0007 16.6673H5.00065Z" fill="#41BC22"/>
                                        </svg></a></div>
                                <div class="qs-inputs files row">
                                    <div class="col-lg-4 col-6">
                                        <input id="foto-1" name="photo_1" type="file">
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <input id="foto-2" name="photo_2" type="file">
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <input id="foto-3" name="photo_3" type="file">
                                    </div>
                                </div>
                                <div class="week-nav">
                                    <div><a class="week-nav_prev_six btn btn-back">Назад</a></div>
                                    <button type="submit" class="btn">Iesniegt Check In</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal week-modal fade" id="reportThanks" tabindex="-1" aria-labelledby="reportThanksLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title mb-0">Спасибо, твои данные сохранены!</div>
                </div>
            </div>
        </div>
    </div>

    <!-- success modal -->
    <div class="modal week-modal fade" id="thanks_weekModal" tabindex="-1" aria-labelledby="thanks_weekModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">Спасибо, твои данные отправлены!</div>
                    <div class="modal-text"> Теперь ты можешь приступать<br> к занятиям из следующей недели.<br> Удачи!</div>
                </div>
            </div>
        </div>
    </div>

    <!-- final modal -->
    <div class="modal week-modal fade" id="finalModal" tabindex="-1" aria-labelledby="thanks_week_sixModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title"><svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="14.5" cy="14.5" r="14.5" fill="#EC2383"/>
                            <path d="M20.0825 11.3525L12.3427 19.6438L9.06955 15.6102L6.9043 17.9531L12.1923 24.4696L22.0948 13.8713L20.0825 11.3525Z" fill="white"/>
                        </svg> Поздравляем с завершением проекта!</div>
                    <div class="modal-paragraph">
                        <p>Ты достойно прошла этот путь и результаты говорят сами за себя!</p>
                        <p>В течение 3-х дней мы обработаем все кейсы и выберем финалисток. Отчет придет тебе на почту и будет опубликован в группе Facebook.</p>
                        <p>Желаем удачи и победы!</p>
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
