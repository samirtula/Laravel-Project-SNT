@extends('layouts/app')
@section('title', 'Авторизация')
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
                <h3 class="title">Войти в систему</h3>
                <form action="{{route('login')}}" method="post" id="authorization" class="forms">
                    @csrf()
                    <input type="email" class='req auth_email' value="{{ old('email') }}" name='email' placeholder="Введите Email">
                    <input type="password" class='req auth_password' name='password' placeholder="Введите пароль">
                    <label class="checkbox-other">
                        <input type="checkbox" value="save" id="save-cookie" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkbox-other-text">Запомнить меня на этом компьютере</span>
                    </label>
                    <input class="login__form-button" type="submit" value="войти">
                </form>
                @if ($errors->any())
                    <div class="warning_wrapper" style="margin-bottom: 50px">
                        @foreach ($errors->all() as $error)
                            <p class="warning">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="private-forms__registration registration">

                <h3 class="title">Регистрация нового пользователя</h3>
                <form action="{{route('register')}}" method="post"  id='registration' class="forms">
                    @csrf()
                    <input type="text" class='req' name='name' {{ old('name') }} placeholder="Введите имя">
                    <input type="text" class='req' name='second_name' placeholder="Введите отчество">
                    <input type="text" class='req' name='last_name' placeholder="Введите фамилию">
                    <input type="email"  class='req email' name='email'  value="{{ old('email') }}" placeholder="Введите Email">
                    <input type="tel" class='req tel' name='telephone' placeholder="Введите номер телефона">
                    <input type="text" class='req' name='plot' placeholder="Номер участка">
                    <input type="password" class='req password' name='password' placeholder="Придумайте пароль(от 6 символов)">
                    <input type="password" class='req confirm' name='password_confirmation'  placeholder="Повторите пароль">
                    <input class="login__form-button" type="submit" value="Зарегистрироваться">
                </form>

            </div>
        </div>
    </section>
 <script src="/js/validator.js"></script>
@stop
