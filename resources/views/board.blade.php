@extends('layouts/app')
@section('title', 'Объявления')
@section('content')

    <section class="application-image images">
        <div class="application-image__title">
            <div class="application-image__title-headers">
                <h1>Объявление</h1>
            </div>
        </div>
    </section>
    <section class="new">
        <div class="new__wrapper">
            <div class="new__block">
                <div class="new__article event">
                    <img class="event__image" src="{{$data->img_path}}" alt="">
                    <div class="event__text">
                        <h5>{{$data->header}}</h5>
                        <p>{!!nl2br($data->text)!!}</p>
                        <hr>
                    </div>
                    <a href="{{route('boards')}}">Вернуться к списку</a>
                </div>

                <div class="news__nav">

                </div>
            </div>
        </div>
    </section>
@stop
