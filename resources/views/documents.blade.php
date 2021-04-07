@extends('layouts/app')
@section('title', 'Главная')
@section('content')
    <section class="docs-image images">
        <div class="docs-image__title">
            <div class="docs-image__title-headers">
                <h1>Документы</h1>
            </div>
        </div>
    </section>
    <section class="docs">
        <div class="docs__wrapper">
            <table class="docs__nav-table">
                <tbody>
                <tr>
                    <td><a href="{{route('get_documents', 'Документы')}}">Документы</a></td>
                    <td><a href="{{route('get_documents', 'Бланки')}}">Бланки</a></td>
                    <td><a href="{{route('get_documents', 'Законодательство')}}">Законодательство</a></td>
                    <td><a href="{{route('get_documents', 'Менеджмент')}}">Работа правления</a></td>
                    <td><a href="{{route('get_documents', 'Благоустройство')}}">Благоустройство</a></td>
                    <td><a href="{{route('get_documents', 'Услуги')}}">Услуги</a></td>
                </tr>
                </tbody>
            </table>
            <table class="docs__table">
                <thead>
                <tr>
                    <th>Наименование документа</th>
                    <th>Дата размещения</th>
                    <th>Скачать</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{date("d.m.Y H:i", strtotime($item->created_at))}}</td>
                        <td><a download href="{{$item->doc_path}}">
                                <img class="docs__download-image" src="../images/documents/download.svg">
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@stop
