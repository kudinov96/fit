@props(["title", "id", "week", "resultTitle"])

<div class="accordion-item">
    <h2 class="accordion-header">
        <button @class(["accordion-button", "collapsed" => !$week["isCurrent"]]) type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $id }}" aria-expanded="false" aria-controls="flush-collapseOne">
            {{ $title }}
        </button>
    </h2>
    <div id="flush-collapse-{{ $id }}" @class(["accordion-collapse", "collapse", "show" => $week["isCurrent"]]) data-bs-parent="#accordionFlushExample">
        <div @class(["accordion-body", "report-send" => $week["result"]])>
            <x-week-content :week="$week"></x-week-content>

            @if($week["result"])
                <div class="week-result_title"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="16" fill="#41BC22"/>
                        <path d="M22.1606 9.7207L13.6202 18.3665L10.0084 14.1604L7.61914 16.6035L13.4542 23.3986L24.381 12.3472L22.1606 9.7207Z" fill="white"/>
                    </svg> {{ $resultTitle }}</div>

                <div class="week-wrapper week-wrapper_flex">
                    <p>Вес: <span>{{ $week["result"]->weight }} {{ __("кг") }}</span></p>
                    <p>Грудь: <span>{{ $week["result"]->breast }} {{ __("см") }}</span></p>
                    <p>Талия: <span>{{ $week["result"]->waistline }} {{ __("см") }}</span></p>
                    <p>Бедра: <span>{{ $week["result"]->hips }} {{ __("см") }}</span></p>
                    <p>Правая рука: <span>{{ $week["result"]->hand }} {{ __("см") }}</span></p>
                    <p>Правая нога: <span>{{ $week["result"]->leg }} {{ __("см") }}</span></p>
                </div>

                @if($week["result"]->message_user || $week["result"]->message_admin)
                    <div class="week-wrapper">
                        <div class="week-title">{{ __("Комментарии") }}</div>
                        @if($week["result"] && $week["result"]->message_user)
                            <div class="comment">
                                <div class="comment-name"><span>{{ auth()->user()->name }}</span> <em style="text-transform: lowercase; font-style: normal;">{{ $week["result"]->message_user_date->translatedFormat("d F H:i") }}</em></div>
                                <div class="comment-text">{{ $week["result"]->message_user }}</div>
                            </div>
                        @endif
                        @if($week["result"] && $week["result"]->message_admin)
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
