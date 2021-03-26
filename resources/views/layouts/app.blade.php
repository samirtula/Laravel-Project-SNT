<!DOCTYPE html>
<html lang="ru">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link href="/css/app.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous"></script>
</head>
<body id="snt">
<header class="header">
    <div class="header__wrapper">
        <div class="header__meet">
            <div class="header__meet-clock-image"></div>
            <span class="header__meet-text">
                @empty($meeting)
                    Дата общего собрания не определена
                @endempty

                @isset($meeting)
                    {{$meeting->text}}
                @endisset
            </span>
        </div>
        <div class="header__tel">
            <div class="header__tel-phone-image"></div>
            @include('inc.telephone')
        </div>
        <div class="header__mail">
            <div class="header__mail-image"></div>
            @include('inc.email')
        </div>
    </div>
</header>
<nav class="nav">
    <div class="nav__wrapper">
        <div class="nav__logo-image"></div>
        <a href="{{route('index')}}">главная</a>
        <a href="{{route('news')}}">новости</a>
        @guest()
            <a href="{{route('authorization')}}">личный кабинет</a>
        @else
            @if(Auth::user()->hasRole('admin'))
                <a href="{{route('admin')}}">личный кабинет</a>
            @elseif(Auth::user()->hasRole('user'))
                <a href="{{route('user')}}">личный кабинет</a>
            @endif
        @endguest

        <a href="{{route('letter')}}">написать в правление</a>
        <a href="{{route('forum')}}">форум</a>
        <a href="{{route('boards')}}">объявления</a>
        <a href="{{route('gallery')}}">фотогалерея</a>
        <a href="{{route('weather')}}">погода</a>

        <div class="nav__burger-menu">
            <span></span>
        </div>

        <div class="footer__social-links">
            @guest()
                <a class="footer__social-links-login" href="{{route('authorization')}}"></a>
            @else
                @if(Auth::user()->hasRole('admin'))
                    <a class="footer__social-links-login"
                       style="background-image: url(../images/layout/login-hover.svg);" href="{{route('admin')}}"></a>
                @elseif(Auth::user()->hasRole('user'))
                    <a class="footer__social-links-login"
                       style="background-image: url(../images/layout/login-hover.svg);" href="{{route('user')}}"></a>
                @endif
            @endguest
        </div>
    </div>

    <div class="nav__burger-wrapper clicked">
        <div class="nav__burger-block">
            <a href="{{route('index')}}">главная</a>
            <a href="{{route('news')}}">новости</a>
            @guest
                <a href="{{route('authorization')}}">личный кабинет</a>
            @else
                <a href="{{route('user')}}">личный кабинет</a>
            @endguest
            <a href="{{route('letter')}}">написать в правление</a>
            <a href="{{route('forum')}}">форум</a>
            <a href="{{route('boards')}}">объявления</a>
            <a href="{{route('gallery')}}">фотогалерея</a>
            <a href="{{route('weather')}}">погода</a>
        </div>
    </div>
</nav>
@yield('content')
<footer class="footer">
    <div class="footer__wrapper">
        <div class="nav__logo-image"></div>
        <a href="{{route('index')}}">главная</a>
        <a href="{{route('news')}}">новости</a>
        @guest()
            <a href="{{route('authorization')}}">личный кабинет</a>
        @else
            @if(Auth::user()->hasRole('admin'))
                <a href="{{route('admin')}}">личный кабинет</a>
            @elseif(Auth::user()->hasRole('user'))
                <a href="{{route('user')}}">личный кабинет</a>
            @endif
        @endguest
        <a href="{{route('letter')}}">написать в правление</a>
        <a href="{{route('forum')}}">форум</a>
        <a href="{{route('boards')}}">объявления</a>
        <a href="{{route('gallery')}}">фотогалерея</a>
        <a href="{{route('weather')}}">погода</a>
        <div class="footer__social-links">
            @guest()
                <a class="footer__social-links-login" href="{{route('authorization')}}"></a>
            @else
                @if(Auth::user()->hasRole('admin'))
                    <a class="footer__social-links-login"
                       style="background-image: url(../images/layout/login-hover.svg);" href="{{route('admin')}}"></a>
                @elseif(Auth::user()->hasRole('user'))
                    <a class="footer__social-links-login"
                       style="background-image: url(../images/layout/login-hover.svg);" href="{{route('user')}}"></a>
                @endif
            @endguest
        </div>
    </div>
</footer>
<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>

