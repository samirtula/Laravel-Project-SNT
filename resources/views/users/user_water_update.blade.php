@extends('layouts.user_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        @include('inc.messages')
        <h5 class="mt-2">Изменить данные</h5>
        <a class="anchor" name="form_add_new"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните поле для изменения показаний</h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('water_indication_save', $data->id)}}" method="post" style="display: flex; flex-direction: column" class="forms" enctype="multipart/form-data">
                            @csrf()
                            <input type="text" class='req' name='value' value="{{$data->value}}" placeholder="Вода">
                            <input type="hidden" value="Вода" class='req' name='type'>
                            <input type="submit" value="Добавить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>
@stop

