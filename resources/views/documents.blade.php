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
                    <td><a href="{{route('get_documents', 'documents')}}">Документы</a></td>
                    <td><a href="{{route('get_documents', 'blanks')}}">Бланки</a></td>
                    <td><a href="{{route('get_documents', 'legislation')}}">Законодательство</a></td>
                    <td><a href="{{route('get_documents', 'management')}}">Работа правления</a></td>
                    <td><a href="{{route('get_documents', 'improvement')}}">Благоустройство</a></td>
                    <td><a href="{{route('get_documents', 'services')}}">Услуги</a></td>
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
                <tr>
                    @foreach($data as $item)
                        <td>{{$item->name}}</td>
                        <td>{{substr($item->created_at, 0, -3)}}</td>
                        <td><a download href="{{$item->doc_path}}">
                                <img class="docs__download-image" src="../images/documents/download.svg">
                            </a>
                        </td>
                    @endforeach
                </tr>

                </tbody>
            </table>
        </div>
    </section>
@stop
