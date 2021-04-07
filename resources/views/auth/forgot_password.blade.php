@extends('layouts.app')
@section('title', 'Сброс пароля')
@section('content')

    <section class="private-image images">
        <div class="private-image__title">
            <div class="private-image__title-headers">
                <h1>авторизация</h1>
            </div>
        </div>
    </section>
    <section class="private-forms">

            <div class="private-forms__wrapper">
                <div class="private-forms__login login">

                    <h3 class="title">Сбросить пароль</h3>
                    <form action="{{route('password.email')}}" method="post" class="forms">
                        @csrf()
                        <input type="email" class='req auth_email' name='email' placeholder="Введите Email">
                        <input class="login__form-button" type="submit" value="сбросить">
                    </form>
                    @include('inc.messages')
                </div>
                <div class="private-forms__registration registration">
                </div>
            </div>
    </section>
    <script src="/js/validator.js"></script>
@stop
