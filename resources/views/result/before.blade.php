@extends("layouts.layout-2")

@section("title", __("Профиль"))

@section("content")
    <div id="main-content">
        <div class="container">
            <h1>{{ $user->name }}, {{ __("привет!") }}</h1>
            <p>{{ __("Давай заполним твои данные до начала марафона.") }}</p>
            <div class="row-gallery">
                <div class="gallery-list">
                    <a><img src="{{ asset("images/foto-1.png") }}" alt=""></a>
                    <a><img src="{{ asset("images/foto-2.png") }}" alt=""></a>
                    <a><img src="{{ asset("images/foto-3.png") }}" alt=""></a>
                </div>
                <div class="gallery-noty">
                    <p>{{ __("ВНИМАНИЕ!") }}</p>
                    <p>{{ __("Стартовые фото нужно сделать как на примере с нашим шаблоном листа в руках, иначе твой кейс не сможет участвовать в борьбе за приз!") }}</p>
                    <p><strong>{{ __("Вот он, скачай и распечатай:") }}</strong></p>
                    <p>
                        <a href="{{ \Storage::url($user->stream->template_for_start) }}" download class="download-link">{{ __("Скачать") }} <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0002 13.3335L5.8335 9.16683L7.00016 7.9585L9.16683 10.1252V3.3335H10.8335V10.1252L13.0002 7.9585L14.1668 9.16683L10.0002 13.3335ZM5.00016 16.6668C4.54183 16.6668 4.14933 16.5035 3.82266 16.1768C3.496 15.8502 3.33294 15.4579 3.3335 15.0002V12.5002H5.00016V15.0002H15.0002V12.5002H16.6668V15.0002C16.6668 15.4585 16.5035 15.851 16.1768 16.1777C15.8502 16.5043 15.4579 16.6674 15.0002 16.6668H5.00016Z" fill="white"/>
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
            <div class="params">
                <form class="needs-validation" action="{{ route("result.store") }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method("POST")

                    <input type="hidden" name="type" value="{{ \App\Enums\ResultTypeEnum::START->value }}">

                    <div class="qs-inputs files row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <input id="foto-1" name="photo_1" type="file" required>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <input id="foto-2" name="photo_2" type="file" required>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <input id="foto-3" name="photo_3" type="file" required>
                        </div>
                    </div>
                    <div class="form-fields">
                        <h3>{{ __("Стартовые параметры") }}</h3>
                        <div class="d-flex">
                            <div>
                                <label>{{ __("Вес (кг):") }}</label>
                                <input name="weight" type="number" step="1" min="1" class="form-control" required>
                            </div>
                            <div>
                                <label>{{ __("Грудь (см):") }}</label>
                                <input name="breast" type="number" step="1" min="1" class="form-control" required>
                            </div>
                            <div>
                                <label>{{ __("Талия (см):") }}</label>
                                <input name="waistline" type="number" step="1" min="1" class="form-control" required>
                            </div>
                            <div>
                                <label>{{ __("Бедро (см):") }}</label>
                                <input name="hips" type="number" step="1" min="1" class="form-control" required>
                            </div>
                            <div>
                                <label>{{ __("Правая рука (см):") }}</label>
                                <input name="hand" type="number" step="1" min="1" class="form-control" required>
                            </div>
                            <div>
                                <label>{{ __("Правая нога (см):") }}</label>
                                <input name="leg" type="number" step="1" min="1" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-action">
                        <button type="submit" class="btn">{{ __("Отправить данные") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $('#foto-1, #foto-2, #foto-3').fileinput({
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
