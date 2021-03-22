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
            @include('inc.meeting_date')
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
        <a href="{{route('authorization')}}">личный кабинет</a>
        <a href="{{route('letter')}}">написать в правление</a>
        <a href="{{route('forum')}}">форум</a>
        <a href="{{route('boards')}}">объявления</a>
        <a href="{{route('gallery')}}">фотогалерея</a>
        <a href="{{route('weather')}}">погода</a>
        <div class="nav__burger-menu">
            <span></span>
        </div>
        <div class="footer__social-links">
            <a class="footer__social-links-login" href="{{route('authorization')}}"></a>
        </div>
    </div>
    <div class="nav__burger-wrapper clicked">
        <div class="nav__burger-block">
            <a href="{{route('index')}}">главная</a>
            <a href="{{route('news')}}">новости</a>
            <a href="{{route('authorization')}}">личный кабинет</a>
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
        <a href="{{route('authorization')}}">личный кабинет</a>
        <a href="{{route('letter')}}">написать в правление</a>
        <a href="{{route('forum')}}">форум</a>
        <a href="{{route('boards')}}">объявления</a>
        <a href="{{route('gallery')}}">фотогалерея</a>
        <a href="{{route('weather')}}">погода</a>
        <div class="footer__social-links">
            <a class="footer__social-links-login" href="{{route('authorization')}}"></a>
        </div>
    </div>
</footer>
<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>

