@extends('layouts.admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">Добавить объявление</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните поля для добавления обсуждения</h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('add_forum')}}" method="post"  style="display: flex; flex-direction: column" class="forms " enctype="multipart/form-data">
                            @csrf()
                            <input type="text" class='req' name='topic' placeholder="Введите заголовок форума">
                            <textarea type="text" class='req' name='message' placeholder="Введите тему обсуждения детально"></textarea>
                            <input type="submit" value="Добавить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="mt-2">Таблица обсуждений</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Список обсуждений</h3>
                    </div>
                    <div class="card-block">
                        <table>
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Тема</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{date("d.m.Y H:i", strtotime($item->created_at))}}</td>
                                    <td>{{$item->topic}}</td>
                                    <td>
                                        <a href="{{route('admin_forum_delete', $item->topic)}}" class="button button_red">Удалить</a>
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

