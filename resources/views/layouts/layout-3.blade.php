<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/style.css?ver=") . date("YmdHis") }}" rel="stylesheet">
    <link href="{{ asset("css/responsive.css?ver=") . date("YmdHis") }}" rel="stylesheet">
    @yield("styles")
</head>
<body>

<div id="page">
    <header id="header">
        <div class="container">
            <a href="{{ route("marathon.index") }}" class="navbar-brand">
                <img src="{{ asset("images/logo.svg") }}" width="164" height="27" alt="">
            </a>
            <div class="user-menu">
                <a href="{{ route("marathon.index") }}">{{ __("Главная") }}</a>
                <a href="{{ route("check-in.index") }}">{{ __("Check in") }}</a>
                <a href="{{ route("result.index") }}">{{ __("Мои результаты") }}</a>
                <a href="{{ route("materials.index") }}" class="materials-link">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19 21H5C3.874 21 3.074 20.509 2.588 19.834C2.21023 19.2966 2.00513 18.6569 2 18V6C2 5.20435 2.31607 4.44129 2.87868 3.87868C3.44129 3.31607 4.20435 3 5 3H15C15.7956 3 16.5587 3.31607 17.1213 3.87868C17.6839 4.44129 18 5.20435 18 6V11H21C21.2652 11 21.5196 11.1054 21.7071 11.2929C21.8946 11.4804 22 11.7348 22 12V18C22 18.493 21.86 19.211 21.412 19.834C20.925 20.51 20.125 21 19 21ZM20 14C20 13.7348 19.8946 13.4804 19.7071 13.2929C19.5196 13.1054 19.2652 13 19 13C18.7348 13 18.4804 13.1054 18.2929 13.2929C18.1054 13.4804 18 13.7348 18 14V18C18 18.2652 18.1054 18.5196 18.2929 18.7071C18.4804 18.8946 18.7348 19 19 19C19.2652 19 19.5196 18.8946 19.7071 18.7071C19.8946 18.5196 20 18.2652 20 18V14Z" fill="#EC2383"/>
                    </svg> {{ __("Материалы для марафона") }}</a>
                <div class="dropdown dropdown-right">
                    <a class="btn-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="profile-menu dropdown-menu">
                        <li><a href="{{ route("profile.index") }}">
                                <img src="{{ asset("images/user-pic.svg") }}" alt="">
                                <div>{{ auth()->user()->name }} <span>{{ auth()->user()->email }}</span></div>
                            </a></li>
                        <li><a href="{{ route("profile.index") }}" class="link-icon link-settings">{{ __("Настройки профиля") }}</a></li>
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
                        <li><a href="{{ route("marathon.index") }}">{{ __("Главная") }}</a></li>
                        <li><a href="{{ route("check-in.index") }}">{{ __("Check in") }}</a></li>
                        <li><a href="{{ route("result.index") }}">{{ __("Мои результаты") }}</a></li>
                        <li><a href="{{ route("materials.index") }}" class="link-icon link-video">{{ __("Материалы для марафона") }}</a></li>
                        <li><a href="{{ route("profile.index") }}" class="link-icon link-settings">{{ __("Настройки профиля") }}</a></li>
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
<script src="{{ asset("js/scripts.js?ver=") . date("YmdHis") }}"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
    });
</script>
@yield("scripts")
</body>
</html>
