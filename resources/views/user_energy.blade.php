@extends('layouts/user_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        <h5 class="mt-2">Добавить показание счетчика электроэнергии</h5>
        <a href="" class="anchor" name="form_add_energy"></a>
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
        <h5 class="mt-2">История показаний счетчика электроэнергии</h5>
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
