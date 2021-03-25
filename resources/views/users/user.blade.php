@extends('layouts.user_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">Добавить показание счетчика воды</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Введите показание счетчика воды</h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('add_water')}}" method="get"
                              style="display: flex; flex-direction: column"
                              class="forms">
                            @csrf()
                            <input type="text" class='req' name='value' placeholder="Вода">
                            <input type="hidden" value="Вода" class='req' name='type'>
                            <input type="submit" value="Добавить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mt-2">История показаний счетчика воды</h5>
        <a class="anchor" name="tables_water"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Показания счетчиков воды</h3>
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
                                <th>Показание</th>
                                <th>Изменить</th>
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
                                        <a href="{{--{{route('admin_boards_update', $item->id)}}--}}" class="button">Изменить</a>
                                    </td>
                                    <td>
                                        <a href="{{--{{route('admin_boards_delete', $item->id)}}--}}" class="button button_red">Удалить</a>
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
