@extends('layouts/admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">Добавить объявление на главную страницу</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните поля для добавления объявления на главную страницу</h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('add_message')}}" method="post"  style="display: flex; flex-direction: column" class="forms " enctype="multipart/form-data">
                            @csrf()
                            <input type="text" class='req' name='header' placeholder="Введите заголовок">
                            <textarea type="text" class='req' name='text' placeholder="Введите текст объявления"></textarea>
                            <select required name="type">
                                <option value="Общее собрание">Дата общего собрания</option>
                                <option value="Объявление">Главное объявление</option>
                            </select>
                            <input type="submit" value="Добавить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mt-2">Таблица объявлений</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Список объявлений</h3>
                    </div>
                    <div class="card-block">
                        <table>
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Заголовок</th>
                                <th>Тип</th>
                                <th>Изменить</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{substr($item->created_at, 0, -3)}}</td>
                                    <td>{{$item->header}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>
                                        <a href="{{route('admin_update', $item->id)}}" class="button">Изменить</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin_delete', $item->id)}}" class="button button_red">Удалить</a>
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

