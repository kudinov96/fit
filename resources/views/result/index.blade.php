@extends("layouts.layout-3")

@section("title", __('Результаты'))

@section("content")
    <div id="main-content">
        <div class="container">
            @if($resultStart)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Стартовые данные <em>(до)</em></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 stat-start">
                            <div>
                                <p>Вес: <span>{{ $resultStart->weight }} кг</span></p>
                                <p>Грудь: <span>{{ $resultStart->breast }} см</span></p>
                                <p>Талия: <span>{{ $resultStart->waistline }} см</span></p>
                                <p>Бедра: <span>{{ $resultStart->hips }} см</span></p>
                                <p>Правая рука: <span>{{ $resultStart->hand }} см</span></p>
                                <p>Правая нога: <span>{{ $resultStart->leg }} см</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 stat-pics">
                            <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_1) }}"><img src="{{ \Storage::url($resultStart->photo_1) }}" alt=""></a>
                            <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_2) }}"><img src="{{ \Storage::url($resultStart->photo_2) }}" alt=""></a>
                            <a data-fancybox="user-gallery" href="{{ \Storage::url($resultStart->photo_3) }}"><img src="{{ \Storage::url($resultStart->photo_3) }}" alt=""></a>
                        </div>
                    </div>
                </div>
            @endif

            @if($resultWeek1)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Результаты первой недели</span>
                    </div>
                    <div class="result-wrapper">
                        <p>Вес: <span>{{ $resultWeek1->weight }} кг</span></p>
                        <p>Грудь: <span>{{ $resultWeek1->breast }} см</span></p>
                        <p>Талия: <span>{{ $resultWeek1->waistline }} см</span></p>
                        <p>Бедра: <span>{{ $resultWeek1->hips }} см</span></p>
                        <p>Правая рука: <span>{{ $resultWeek1->hand }} см</span></p>
                        <p>Правая нога: <span>{{ $resultWeek1->leg }} см</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek2)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Результаты второй недели</span>
                    </div>
                    <div class="result-wrapper">
                        <p>Вес: <span>{{ $resultWeek2->weight }} кг</span></p>
                        <p>Грудь: <span>{{ $resultWeek2->breast }} см</span></p>
                        <p>Талия: <span>{{ $resultWeek2->waistline }} см</span></p>
                        <p>Бедра: <span>{{ $resultWeek2->hips }} см</span></p>
                        <p>Правая рука: <span>{{ $resultWeek2->hand }} см</span></p>
                        <p>Правая нога: <span>{{ $resultWeek2->leg }} см</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek3)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Результаты третей недели</span>
                    </div>
                    <div class="result-wrapper">
                        <p>Вес: <span>{{ $resultWeek3->weight }} кг</span></p>
                        <p>Грудь: <span>{{ $resultWeek3->breast }} см</span></p>
                        <p>Талия: <span>{{ $resultWeek3->waistline }} см</span></p>
                        <p>Бедра: <span>{{ $resultWeek3->hips }} см</span></p>
                        <p>Правая рука: <span>{{ $resultWeek3->hand }} см</span></p>
                        <p>Правая нога: <span>{{ $resultWeek3->leg }} см</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek4)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Результаты четвертой недели</span>
                    </div>
                    <div class="result-wrapper">
                        <p>Вес: <span>{{ $resultWeek4->weight }} кг</span></p>
                        <p>Грудь: <span>{{ $resultWeek4->breast }} см</span></p>
                        <p>Талия: <span>{{ $resultWeek4->waistline }} см</span></p>
                        <p>Бедра: <span>{{ $resultWeek4->hips }} см</span></p>
                        <p>Правая рука: <span>{{ $resultWeek4->hand }} см</span></p>
                        <p>Правая нога: <span>{{ $resultWeek4->leg }} см</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek5)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Результаты пятой недели</span>
                    </div>
                    <div class="result-wrapper">
                        <p>Вес: <span>{{ $resultWeek5->weight }} кг</span></p>
                        <p>Грудь: <span>{{ $resultWeek5->breast }} см</span></p>
                        <p>Талия: <span>{{ $resultWeek5->waistline }} см</span></p>
                        <p>Бедра: <span>{{ $resultWeek5->hips }} см</span></p>
                        <p>Правая рука: <span>{{ $resultWeek5->hand }} см</span></p>
                        <p>Правая нога: <span>{{ $resultWeek5->leg }} см</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek6)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Результаты шестой недели</span>
                    </div>
                    <div class="result-wrapper">
                        <p>Вес: <span>{{ $resultWeek6->weight }} кг</span></p>
                        <p>Грудь: <span>{{ $resultWeek6->breast }} см</span></p>
                        <p>Талия: <span>{{ $resultWeek6->waistline }} см</span></p>
                        <p>Бедра: <span>{{ $resultWeek6->hips }} см</span></p>
                        <p>Правая рука: <span>{{ $resultWeek6->hand }} см</span></p>
                        <p>Правая нога: <span>{{ $resultWeek6->leg }} см</span></p>
                    </div>
                </div>
            @endif

            @if($resultWeek6)
                <div class="result-box">
                    <div class="result-head">
                        <a class="edit-link"></a>
                        <span>Финишные данные <em>(после)</em></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 stat-start">
                            <div>
                                <p>Вес: <span>{{ $resultWeek6->weight }} кг</span></p>
                                <p>Грудь: <span>{{ $resultWeek6->breast }} см</span></p>
                                <p>Талия: <span>{{ $resultWeek6->waistline }} см</span></p>
                                <p>Бедра: <span>{{ $resultWeek6->hips }} см</span></p>
                                <p>Правая рука: <span>{{ $resultWeek6->hand }} см</span></p>
                                <p>Правая нога: <span>{{ $resultWeek6->leg }} см</span></p>
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
@endsection
