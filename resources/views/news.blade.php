@extends('layouts/app')
@section('title', 'Новости')
@section('content')

    <section class="news-image images">
        <div class="news-image__title">
            <div class="news-image__title-headers">
                <h1>новости</h1>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="news__wrapper">
            <div class="news__block">
                @foreach($data as $item)
                    <a class="news__article article" href="{{route('news-one', $item->id)}}">
                        <img class="article__image" src="{{$item->img_path}}" alt="">
                        <span style="align-self: start">{{substr($item->created_at, 0, -3)}}</span>
                        <div class="article__text">
                            <h5>{{$item->header}}</h5>
                            <p>{{$item->text}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="news__nav">
                @foreach($data as $item)
                    <a href="{{route('news-one', $item->id)}}" class="news__nav-header">
                        <h6>{{$item->header}}</h6>
                        <span class="news__nav-keys">{{substr($item->created_at, 0, -3)}}<br>{{$item->keyword}}</span>
                        <hr>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@stop
