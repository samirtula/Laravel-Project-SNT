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
                    <h4>Jane Donovan</h4>
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
            <li><a href="#"><em class="fa fa-home"></em> Вверх</a></li>
            <li><a href="#form_add_water"><em class="fa fa-pencil-square-o"></em> Добавить показания счетчика воды</a>
            </li>
            <li><a href="#form_add_energy"><em class="fa fa-pencil-square-o"></em> Добавить показания счетчика
                    электроэнергии</a></li>
        </ul>
    </div>

    @yield('content')

    <p class="credit">HTML5 Admin Template by <a href="https://www.medialoot.com">Medialoot</a></p>
    </section>
</div>
<script src="js/validator.js"></script>
</body>
</html>

