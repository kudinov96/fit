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
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::START->value }}" data-number="1" data-bs-toggle="modal" data-bs-target="#editPhoto">send</button>
                            </div>
                            <div>
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_2) }}"><img src="{{ \Storage::url($resultStart->photo_2) }}" alt=""></a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::START->value }}" data-number="2" data-bs-toggle="modal" data-bs-target="#editPhoto">send</button>
                            </div>
                            <div>
                                <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_3) }}"><img src="{{ \Storage::url($resultStart->photo_3) }}" alt=""></a>
                                <button type="button" class="stat-pics-btn" data-type="{{ \App\Enums\ResultTypeEnum::START->value }}" data-number="3" data-bs-toggle="modal" data-bs-target="#editPhoto">send</button>
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
                            <a data-fancybox="user-gallery-after" href="{{ \Storage::url($resultWeek6->photo_1) }}"><img src="{{ \Storage::url($resultWeek6->photo_1) }}" alt=""></a>
                            <a data-fancybox="user-gallery-after" href="{{ \Storage::url($resultWeek6->photo_2) }}"><img src="{{ \Storage::url($resultWeek6->photo_2) }}" alt=""></a>
                            <a data-fancybox="user-gallery-after" href="{{ \Storage::url($resultWeek6->photo_3) }}"><img src="{{ \Storage::url($resultWeek6->photo_3) }}" alt=""></a>
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

                        <div class="qs-inputs files row">
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
                browseClass: 'btn-foto',
                removeLabel: '{{ __("Удалить") }}',
                removeClass: 'd-none'
            }).on('fileuploaded', function(event, previewId, index, fileId) {

            });
        });
    </script>
@endsection
