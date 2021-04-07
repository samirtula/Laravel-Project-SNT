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
                <h3 class="title">Введите новые данные</h3>
                <form action="{{route('password.update')}}" method="post" class="forms">
                    @csrf()
                    <input type="hidden" name="token" value="{{request()->token}}">
                    <input type="email"  id="email" class='req auth_email' name="email"
                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Введите Email">
                    <input type="password" id="password" class='req password' name='password' required autocomplete="new-password" placeholder="Введите пароль">
                    <input type="password" id="password-confirm" class='req confirm' name='password_confirmation' required autocomplete="new-password" placeholder="Повторите пароль">

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
