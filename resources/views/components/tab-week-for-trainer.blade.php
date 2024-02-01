@props(["week", "user", "title1", "title2"])

<div @class(["tab-pane", "fade", "show" => $week["number"] === 1, "active" => $week["number"] === 1]) id="pills-week{{ $week["number"] }}" role="tabpanel" aria-labelledby="pills-week{{ $week["number"] }}-tab" tabindex="0">
    <div class="week-wrapper">
        <div class="week-title">{{ $title1 }}:</div>
        <div class="table-responsive">
            <x-week-content :week="$week" :isTrainerPage="true"></x-week-content>
        </div>
        @if($week['result'])
            <div class="week-title">{{ $title2 }}:</div>
            <div class="row">
                <div class="col-lg-6 stat-start">
                    <div>
                        <p>{{ __('Вес') }}: <span>{{ $week['result']->weight }} кг</span></p>
                        <p>Грудь: <span>{{ $week['result']->breast }} см</span></p>
                        <p>Талия: <span>{{ $week['result']->waistline }} см</span></p>
                        <p>Бедра: <span>{{ $week['result']->hips }} см</span></p>
                        <p>Правая рука: <span>{{ $week['result']->hand }} см</span></p>
                        <p>Правая нога: <span>{{ $week['result']->leg }} см</span></p>
                    </div>
                </div>
                @if($week['number'] === 6)
                    <div class="col-lg-6 stat-pics">
                        <a data-fancybox="user-gallery-finish" href="{{ \Storage::url($week['result']->photo_1) }}"><img src="{{ \Storage::url($week['result']->photo_1) }}" alt=""></a>
                        <a data-fancybox="user-gallery-finish" href="{{ \Storage::url($week['result']->photo_2) }}"><img src="{{ \Storage::url($week['result']->photo_2) }}" alt=""></a>
                        <a data-fancybox="user-gallery-finish" href="{{ \Storage::url($week['result']->photo_3) }}"><img src="{{ \Storage::url($week['result']->photo_3) }}" alt=""></a>
                    </div>
                @endif
            </div>
        @endif
    </div>

    @if($week["result"])
        <div class="week-wrapper">
            <div class="week-title">Комментарии</div>
            @if($week["result"] && $week["result"]->message_user)
                <div class="comment">
                    <div class="comment-name"><span>{{ $user->name }}</span> <em style="text-transform: lowercase; font-style: normal;">{{ $week["result"]->message_user_date->translatedFormat("d F H:i") }}</em></div>
                    <div class="comment-text">{{ $week["result"]->message_user }}</div>
                </div>
            @endif
            @if($week["result"] && $week["result"]->message_admin)
                <div class="comment comment-answer">
                    <div class="comment-name"><span>{{ \App\Models\User::admin()->name }}</span> <em style="text-transform: lowercase; font-style: normal;">{{ $week["result"]->message_admin_date->translatedFormat("d F H:i") }}</em></div>
                    <div class="comment-text">{{ $week["result"]->message_admin }}</div>
                </div>
            @else
                <div class="comment-form">
                    <form class="needs-validation settings-form" method="POST" action="{{ route("user.answerAdmin") }}" novalidate>
                        @csrf
                        @method("PUT")

                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="result_id" value="{{ $week["result"]->id }}">

                        <div class="form-item">
                            <textarea name="message" value="" class="form-control" required></textarea>
                            <div class="invalid-feedback">
                                Введите комментарий
                            </div>
                        </div>
                        <div class="form-action d-flex justify-content-end">
                            <button type="submit" class="btn">Отправить</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    @endif
</div>
