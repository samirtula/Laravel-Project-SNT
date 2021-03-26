<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Личный кабинет</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700"
          rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/milligram.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar">
    <div class="row">
        <div class="column column-30 col-site-title">
            <a href="{{route('index')}}" class="site-title float-left">СНТ "Солнечный"</a></div>
        <div class="column column-30">
            <div class="user-section">
                <div class="username">
                    <h4>{{Auth::user()->name}} {{Auth::user()->last_name}}</h4>
                    <p>Пользователь</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div id="sidebar" class="column">
        <h5>Навигация</h5>
        <ul>
            <li>
                <a href="{{route('user')}}"><em class="fa fa-pencil-square-o"></em> Добавить показания счетчика воды</a>
            </li>
            <li>
                <a href="{{route('user_energy')}}"><em class="fa fa-pencil-square-o"></em> Добавить показания счетчика
                    электроэнергии</a>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Выйти" style="margin-left: 20px">
                </form>
            </li>
        </ul>
    </div>

    @yield('content')

    </section>
</div>
<script src="js/validator.js"></script>
</body>
</html>

