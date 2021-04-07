@extends('layouts/app')
@section('title', 'Объявления')
@section('content')

    <section class="boards-image images">
        <div class="boards-image__title">
            <div class="boards-image__title-headers">
                <h1>объявления</h1>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="news__wrapper">
            <div class="news__block">
                @foreach($data as $item)
                    <a class="news__article article" href="{{route('boards-one', $item->id)}}">
                        <img class="article__image" src="{{$item->img_path}}" alt="">
                        <span style="align-self: start">{{date("d.m.Y H:i", strtotime($item->created_at))}} </span>
                        <div class="article__text">
                            <h5>{{$item->header}}</h5>
                            <p>{{$item->text}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="news__nav">
                @foreach($data as $item)
                    <a href="{{route('boards-one', $item->id)}}" class="news__nav-header">
                        <h6>{{$item->header}}</h6>
                        <span class="news__nav-keys">{{date("d.m.Y H:i", strtotime($item->created_at))}}<br>{{$item->keyword}}</span>
                        <hr>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@stop
