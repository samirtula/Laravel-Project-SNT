@extends('layouts.admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">История показаний</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Показания счетчиков</h3>
                    </div>
                    <div class="card-block">
                        <table>
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Тип</th>
                                <th>Участок</th>
                                <th>Показания</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{substr($item->created_at, 0, -3)}}</td>
                                    <td>{{$item->last_name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->plot}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>
                                        <a href="{{route('admin_indication_delete', $item->id)}}" class="button button_red">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop

