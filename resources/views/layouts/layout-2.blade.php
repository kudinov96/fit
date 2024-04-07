<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/select2.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/style.css?ver=") . date("YmdHis") }}" rel="stylesheet">
    <link href="{{ asset("css/responsive.css?ver=") . date("YmdHis") }}" rel="stylesheet">
    @yield("styles")
</head>

<body>

<div id="page">
    <header id="header">
        <div class="container">
            <a href="{{ route("stream.index") }}" class="navbar-brand">
                <img src="{{ asset("images/logo.svg") }}" width="164" height="27" alt="">
            </a>
            <div class="user-menu">
                <div class="dropdown dropdown-right">
                    <a class="btn-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="profile-menu dropdown-menu">
                        <li><a href="{{ route("profile.index") }}">
                                <img src="{{ asset("images/user-pic.svg") }}" alt="">
                                <div>{{ auth()->user()->name }} <span>{{ auth()->user()->email }}</span></div>
                            </a></li>
                        <li><a href="{{ route("profile.index") }}" class="link-icon link-settings">{{ __('Настройки профиля') }}</a></li>
                        <li>
                            <form action="{{ route("logout") }}" method="POST">
                                @csrf
                                @method("POST")
                                <button type="submit" class="link-icon link-logout">{{ __('Выйти') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="17" height="2" rx="1" fill="white"/>
                    <rect y="6" width="17" height="2" rx="1" fill="white"/>
                    <rect y="12" width="17" height="2" rx="1" fill="white"/>
                </svg> {{ auth()->user()->name }}</button>
        </div>
        <div class="d-block d-lg-none">
            <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="profile-menu">
                        <li><a href="{{ route("profile.index") }}">
                                <img src="{{ asset("images/user-pic.svg") }}" alt="">
                                <div>{{ auth()->user()->name }} <span>{{ auth()->user()->email }}</span></div>
                            </a></li>
                        <li><a href="{{ route("profile.index") }}" class="link-icon link-settings">{{ __('Настройки профиля') }}</a></li>
                        <li>
                            <form action="{{ route("logout") }}" method="POST">
                                @csrf
                                @method("POST")
                                <button type="submit" class="link-icon link-logout">{{ __('Выйти') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    @yield("content")

    <x-footer></x-footer>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
<script src="{{ asset("js/select2.min.js") }}" defer></script>
<script src="{{ asset("js/scripts.js") }}"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
    });

    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
@yield("scripts")
</body>
</html>
