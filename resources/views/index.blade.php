@extends('layouts/app')
@section('title', 'Главная')
@section('content')

    <section class="image images">
        <div class="image__title">
            <div class="image__title-headers">
                <h4>Добро пожаловать</h4>
                <h1>снт "Солнечный"</h1>
                <h4>Зарегистрирован 01.07.2009 г. <br> Адрес: 301130, Тульская область, Ленинский район, деревня
                    Дементеево</h4>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="main__wrapper">
            <h2>
                @empty($message)
                    Объявление
                @endempty

                @isset($message)
                    {{$message->header}}
                @endisset
            </h2>

            <p class="main__header">
                @empty($message)
                    Объявления нет
                @endempty

                @isset($message)
                    {{$message->text}}
                @endisset
            </p>

        </div>
    </section>
    <section class="documents">
        <div class="documents__wrapper">
            <h2>документы</h2>
            <div class="documents__menu-block">
                <a class="documents__menu-block-link-wrapper" href="{{route('get_documents', 'Документы')}}">
                    <div class="documents__menu-block-link-inner">
                        <span>Документы</span>
                    </div>
                </a>
                <a class="documents__menu-block-link-wrapper" href="{{route('get_documents', 'Бланки')}}">
                    <div class="documents__menu-block-link-inner">
                        <span>Бланки документов</span>
                    </div>
                </a>
                <a class="documents__menu-block-link-wrapper" href="{{route('get_documents', 'Законодательство')}}">
                    <div class="documents__menu-block-link-inner">
                        <span>Законодательство</span>
                    </div>
                </a>
                <a class="documents__menu-block-link-wrapper" href="{{route('get_documents', 'Менеджмент')}}">
                    <div class="documents__menu-block-link-inner">
                        <span>Работа правления</span>
                    </div>
                </a>
                <a class="documents__menu-block-link-wrapper" href="{{route('get_documents', 'Благоустройство')}}">
                    <div class="documents__menu-block-link-inner">
                        <span>Благоустройство</span>
                    </div>
                </a>
                <a class="documents__menu-block-link-wrapper" href="{{route('get_documents', 'Услуги')}}">
                    <div class="documents__menu-block-link-inner">
                        <span>Услуги</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="payment">
        <div class="payment__wrapper">
            <h2>информация по оплате</h2>
            <div class="payment__block">
                <div class="payment__block-info payment-info">
                    <div class="payment-info__image payment-info__image_1"></div>
                    <div class="payment-info__text"><span
                            class="payment-info__title">членские взносы</span>@include('inc.payment_mem')</div>
                </div>
                <div class="payment__block-info payment-info">
                    <div class="payment-info__image payment-info__image_2"></div>
                    <div class="payment-info__text"><span
                            class="payment-info__title">целевые взносы</span>@include('inc.payment_ceil')</div>
                </div>
                <div class="payment__block-info payment-info">
                    <div class="payment-info__image payment-info__image_3"></div>
                    <div class="payment-info__text"><span
                            class="payment-info__title">электроэнергия</span>@include('inc.payment_electricity')</div>
                </div>
            </div>
        </div>
    </section>
    <section class="address">
        <div class="address__wrapper">
            <h2>как добраться</h2>
            <div class="address__block">
                <div class="address__info"><span id="auto">на автомобиле</span><span id="public-trans">на общественном транспорте</span>
                    <p class="address__auto-text">По Красноармейскому проспекту, улице Путейской, Одоевскому шоссе,
                        трассе Р139 через поселок Иншинский до деревни Хопилово, далее 1,5 км в сторону деревни
                        Дементеево.</p>
                    <p class="address__public-trans-text">На автобусах 18, 25, 27А, 28, троллейбусах 1, 2, 11,
                        маршрутках 9, 30, 33, 34, 35, 62, 114К до остановки 'Педагогический университет' далее на
                        маршрутках 122, 175К(Тула-Дубна) до деревни Хопилово 1.5 км пешком в направлении деревни
                        Дементьево.</p>
                    <div class="address__time">
                        <div class="address__time-block">
                            <div class="address__text"><span class="address__text-title">адрес:<br></span><span
                                    class="address__text-subtitle"> Тульская область, Ленинский район, д. Дементеево</span>
                            </div>
                            <div class="address__text"><span
                                    class="address__text-title">часы приема:<br></span>@include('inc.work_time')</div>
                        </div>
                        <div class="address__time-block">
                            <div class="address__text"><span
                                    class="address__text-title">тел:<br></span>@include('inc.telephone_bottom')</div>
                            <div class="address__text"><span
                                    class="address__text-title">работа правления:<br></span>@include('inc.work_time')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="address__map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79230.22293476373!2d37.39741232215428!3d54.14499113867693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41346b051ee86d11%3A0xa319c90e0ef7aad6!2z0JTQtdC80LXQvdGC0LXQtdCy0L4sINCi0YPQu9GM0YHQutCw0Y8g0L7QsdC7Lg!5e0!3m2!1sru!2sru!4v1614692673877!5m2!1sru!2sru"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79230.22293476373!2d37.39741232215428!3d54.14499113867693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41346b051ee86d11%3A0xa319c90e0ef7aad6!2z0JTQtdC80LXQvdGC0LXQtdCy0L4sINCi0YPQu9GM0YHQutCw0Y8g0L7QsdC7Lg!5e0!3m2!1sru!2sru!4v1614692758248!5m2!1sru!2sru"
                        width="320" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
@stop
