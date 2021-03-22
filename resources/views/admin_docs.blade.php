@extends('layouts/admin_nav')
@section('content')

    <section id="main-content" class="column column-offset-20">
        <h5 class="mt-2">Добавить документ</h5>
        <a class="anchor" name="form_add_docs"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Заполните поля для добавления документа </h3>
                    </div>
                    <div class="card-block">
                        <form action="{{route('add_document')}}" method="post" style="display: flex; flex-direction: column" class="forms" enctype="multipart/form-data">
                            @csrf()
                            <input type="text" class='req' name='name' placeholder="Введите наименнование документа">
                            <span style="font-weight: bold">Выберите тип документа</span>
                            <select required name="docs_section">
                                <option value="documents">Документы</option>
                                <option value="blanks">Бланки документов</option>
                                <option value="legislation">Законодательство</option>
                                <option value="management">Работа правления</option>
                                <option value="improvement">Благоустройство</option>
                                <option value="services">Услуги</option>
                            </select>
                            <input type="file" class='custom-file-input_doc' name='document'>
                            <input type="submit" value="Добавить" style="width: 290px">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="mt-2">Таблица документов</h5>
        <a class="anchor" name="tables_docs"></a>
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Список документов</h3>
                    </div>
                    <div class="card-block">
                        <table>
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Наименование</th>
                                <th>Раздел</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{substr($item->created_at, 0, -3)}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->section}}</td>
                                    <td>
                                        <a href="{{route('admin_docs_delete', $item->id)}}" class="button button_red">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@stop

