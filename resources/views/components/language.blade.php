<div class="dropdown-center" style="text-transform: uppercase;">
    <a class="btn-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ app()->currentLocale() }}
    </a>
    <ul class="dropdown-menu dropdown-menu-dark">
        @foreach(otherLangs() as $lang)
            <li><a class="dropdown-item" href="{{ url()->current() . '?' . http_build_query(array_merge(request()->query(), ['lang' => $lang])) }}">{{ $lang }}</a></li>
        @endforeach
    </ul>
</div>
