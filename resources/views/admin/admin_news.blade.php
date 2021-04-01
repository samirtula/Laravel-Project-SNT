@extends('layouts.admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">Добавить новость</h5>
        <a class="anchor" name="form_add_new"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните поля для добавления новости </h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('add_new')}}" method="post" style="display: flex; flex-direction: column" class="forms" enctype="multipart/form-data">
                            @csrf()
                            <input type="text" class='req' name='header' placeholder="Введите заголовок">
                            <input type="text" class='req' name='keyword' placeholder="Введите ключевое слово">
                            <textarea type="text" class='req' name='text' placeholder="Введите текст новости"></textarea>
                            <input type="file" class='custom-file-input' name='image'>
                            <input type="submit" value="Добавить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mt-2">Таблица новостей</h5>
        <a class="anchor" name="tables_news"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Список новостей</h3>
                    </div>
                    <div class="card-block">
                        <table>
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Заголовок</th>
                                <th>Ключевое слово</th>
                                <th>Изменить</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{date("d.m.Y H:i", strtotime($item->created_at))}}</td>
                                    <td>{{$item->header}}</td>
                                    <td>{{$item->keyword}}</td>
                                    <td>
                                        <a href="{{route('admin_news_update', $item->id)}}" class="button">Изменить</a>
                                        </td>
                                    <td>
                                        <a href="{{route('admin_news_delete', $item->id)}}" class="button button_red">Удалить</a>
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

