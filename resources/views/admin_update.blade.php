@extends('layouts/admin_nav')
@section('content')
    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">Добавить объявление на главную страницу</h5>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните поля для добавления объявления </h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('admin_update_save', $data->id)}}" method="post" style="display: flex; flex-direction: column" class="forms" enctype="multipart/form-data">
                            @csrf()
                            <input type="text" class='req' name='header' value="{{$data->header}}" placeholder="Введите заголовок">
                            <textarea type="text" style="height: 300px" class='req' name='text' placeholder="Введите текст объявления"> {!! $data->text !!}
                            </textarea>
                            <input type="submit" value="Изменить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>
@stop

