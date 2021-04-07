@extends('layouts/app')
@section('title', 'Форум')
@section('content')

    <section class="forum-image images">
        <div class="forum-image__title">
            <div class="forum-image__title-headers">
                <h1>форум</h1>
            </div>
        </div>
    </section>
    <section class="forum-discuss">
        <div class="forum-discuss__wrapper">

            <h3>{{$topic}}</h3>

            <div class="forum-discuss__table-block">
                @foreach($data as $item)
                    <div class="forum-discuss__table">
                        <table>
                            <thead>
                            <tr>
                                <td>{{$item->name}} {{$item->last_name}}
                                    {{date("d.m.Y г. в H:i мин.", strtotime($item->created_at))}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$item->message}}
                                    @if(Auth::user()->hasRole('admin') or Auth::user()->id == $item->user_id)
                                        <a href="{{route('delete_discuss_message', ['id' => $item->id, 'topic' => $item->topic])}}" class="forum-delete-link">Удалить
                                            сообщение <img class="forum-delete-image" src="images/gallery/close-hover.png"></a>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        @endforeach
                        <form action="{{route('add_discuss_message')}}" method="post"
                              style="display: flex; flex-direction: column" class="forms "
                              enctype="multipart/form-data">
                            @csrf()
                            <textarea type="text" class='req' name='message' placeholder="Сообщение"></textarea>
                            <input type="hidden" name="topic" value="{{$topic}}">
                            <input type="submit" value="Отправить">
                        </form>
                    </div>
            </div>
    </section>
    <script src="js/validator.js"></script>
@stop
