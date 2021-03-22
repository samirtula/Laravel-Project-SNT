@extends('layouts/admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">Добавить нового пользователя</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните данные для регистрации пользователя</h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('registration')}}" method="post"  id='registration'  style="display: flex; flex-direction: column" class="forms">
                            @csrf()
                            <input type="text" class='req' name='name' placeholder="Введите имя">
                            <input type="text" class='req' name='second_name' placeholder="Введите отчество">
                            <input type="text" class='req' name='last_name' placeholder="Введите фамилию">
                            <input type="email"  class='req email' name='email' placeholder="Введите Email">
                            <input type="tel" class='req tel' name='telephone' placeholder="Введите номер телефона">
                            <input type="password" class='req password' name='password' placeholder="Придумайте пароль(от 6 символов)">
                            <input type="password" class='req confirm' name='confirm' placeholder="Повторите пароль">
                            <input class="login__form-button" type="submit" value="Зарегистрировать" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Изменить</th>
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
                                    <td>{{$item->telephone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td><a href="{{route('news-one', $item->id)}}" class="button">X</a></td>
                                    <td><a href="{{route('news-one', $item->id)}}" class="button button_red">X</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop
