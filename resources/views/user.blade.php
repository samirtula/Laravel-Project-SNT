@extends('layouts/user_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
    <div class="row grid-responsive">
        <div class="column page-heading">
            <div class="large-card">
                <h1>Здесь надо как-то сделать вывод главного объявления</h1>
                <p class="text-large">Текст самого объявления</p>
            </div>
        </div>
    </div>
    <!--Forms-->
    <h5 class="mt-2">Добавить показание счетчика воды</h5>
    <a class="anchor" name="form_add_water"></a>
    <div class="row grid-responsive">
        <div class="column ">
            <div class="card">
                <div class="card-title">
                    <h3>Введите показание счетчика воды</h3>
                </div>
                <div class="card-block">
                    <form action="{{('ХХ')}}" method="post" style="display: flex; flex-direction: column"
                          class="forms">
                        @csrf()
                        <input type="text" class='req' name='header' placeholder="Вода">
                        <input type="submit" value="Добавить" style="width: 290px">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Forms News-->
    <h5 class="mt-2">Добавить показание счетчика электроэнергии</h5>
    <a class="anchor" name="form_add_energy"></a>
    <div class="row grid-responsive">
        <div class="column ">
            <div class="card">
                <div class="card-title">
                    <h3>Введите показание счетчика электроэнергии</h3>
                </div>
                <div class="card-block">
                    <form action="{{('ХХ')}}" method="post" style="display: flex; flex-direction: column"
                          class="forms">
                        @csrf()
                        <input type="text" class='req' name='header' placeholder="Электроэнергия">
                        <input type="submit" value="Добавить" style="width: 290px">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Tables water-->
    <h5 class="mt-2">Истрия показаний счетчика воды</h5>
    <a class="anchor" name="tables_water"></a>
    <div class="row grid-responsive">
        <div class="column ">
            <div class="card">
                <div class="card-title">
                    <h3>Показания счетчиков воды</h3>
                </div>
                <div class="card-block">
                    <table>
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Фамилия</th>
                            <th>Имя</th>
                            <th>Отчество</th>
                            <th>Тип</th>
                            <th>Показание</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Jane Donovan</td>
                            <td>UI Developer</td>
                            <td>23</td>
                            <td>Philadelphia, PA</td>
                            <td>Jane Donovan</td>
                            <td>123456</td>

                        </tr>
                        <tr>
                            <td>Jane Donovan</td>
                            <td>UI Developer</td>
                            <td>23</td>
                            <td>Philadelphia, PA</td>
                            <td>UI Developer</td>
                            <td>123456</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Tables energy-->
    <h5 class="mt-2">Истрия показаний счетчика электроэнергии</h5>
    <a class="anchor" name="tables_energy"></a>
    <div class="row grid-responsive">
        <div class="column ">
            <div class="card">
                <div class="card-title">
                    <h3>Показания счетчиков электроэнергии</h3>
                </div>
                <div class="card-block">
                    <table>
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Фамилия</th>
                            <th>Имя</th>
                            <th>Отчество</th>
                            <th>Тип</th>
                            <th>Показание</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Jane Donovan</td>
                            <td>UI Developer</td>
                            <td>23</td>
                            <td>Philadelphia, PA</td>
                            <td>Jane Donovan</td>
                            <td>123456</td>

                        </tr>
                        <tr>
                            <td>Jane Donovan</td>
                            <td>UI Developer</td>
                            <td>23</td>
                            <td>Philadelphia, PA</td>
                            <td>Jane Donovan</td>
                            <td>123456</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
