@extends('layouts.admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')

        <h5 class="mt-2">Таблица пользователей</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Список пользователей</h3>
                    </div>
                    <div class="card-block">
                        <table>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Отчество</th>
                                <th>Участок</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->second_name}}</td>
                                    <td>{{$item->last_name}}</td>
                                    <td>{{$item->plot}}</td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td><a href="{{route('delete_user', $item->id)}}" class="button button_red">удалить</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop
