@extends('layouts/app')
@section('title', 'Новость')
@section('content')

    <section class="new-image images">
        <div class="new-image__title">
            <div class="new-image__title-headers">
                <h1>новости</h1>
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
                    <a href="{{route('news')}}">Вернуться к списку</a>
                </div>

                <div class="news__nav">

                </div>
            </div>
        </div>
    </section>
@stop
