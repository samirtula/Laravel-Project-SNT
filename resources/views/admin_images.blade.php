@extends('layouts/admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">

        <h5 class="mt-2">Добавить фото в галерею</h5>
        <a class="anchor" name="form_add_photo"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните поля для добавления фото </h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('add_image')}}" method="post" style="display: flex; flex-direction: column" class="forms" enctype="multipart/form-data">
                            @csrf()
                            <input type="text" class='req' name='keyword' placeholder="Введите ключевое слово" >
                            <input type="file" class='custom-file-input' name='image'>
                            <input type="submit" value="Добавить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="mt-2">Таблица фотографий</h5>
        <a class="anchor" name="tables_images"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Список фотографий</h3>
                    </div>
                    <div class="card-block">
                        <table>
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Описание</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{substr($item->created_at, 0, -3)}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <a href="{{route('admin_images_delete', $item->id)}}" class="button button_red">Удалить</a>
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

