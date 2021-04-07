@extends('layouts/app')
@section('title', 'Форум')
@section('content')

    <section class="forum-image images">
        <div class="forum-image__title">
            <div class="forum-image__title-headers">
                <h1>форум</h1>
            </div>
        </div>
    </section>
    <section class="forum">
        <div class="forum__wrapper">
            <table class="forum__table">
                <thead>
                <tr>
                    <th>Тема</th>
                    <th>Последнее сообщение</th>
                    <th>Перейти к обсуждению</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->topic}}</td>
                        <td>{{$item->name}} {{$item->last_name}} {{date("d.m.Y H:i", strtotime($item->created_at))}}</td>
                        <td><a href="{{route('discuss', $item->topic)}}"><img class="forum__arrow-image"
                                                             src="images/forum/arrow.svg"></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@stop
