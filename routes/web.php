<?php

use Illuminate\Support\Facades\Route;

Route::get('/news/', function () {
    return view('news');
})->name('news');

Route::get('/board/', function () {
    return view('boards');
})->name('boards');

Route::get('/gallery/', function () {
    return view('gallery');
})->name('gallery');

Route::get('/weather/', function () {
    return view('weather');
})->name('weather');

Route::get('/personal/', function () {
    return view('personal');
})->name('personal');

Route::get('/letter/', function () {
    return view('letter');
})->name('letter');

Route::get('/authorization/', function () {
    return view('authorization');
})->name('authorization');

Route::get('/forum/', function () {
    return view('forum');
})->name('forum');

Route::get('/admin/', function () {
    return view('admin');
})->name('admin');

Route::get('/user/', function () {
    return view('user');

})->name('user');

Route::post('/registration/form', 'App\Http\Controllers\UserController@registration')->name('registration');

Route::post('/authorization/form', 'App\Http\Controllers\UserController@authorization')->name('check');

Route::post('/add_new/', 'App\Http\Controllers\NewsController@addNew')->name('add_new');

Route::post('/add_board/', 'App\Http\Controllers\BoardsController@addBoard')->name('add_board');

Route::post('/add_document/', 'App\Http\Controllers\DocumentsController@addDocument')->name('add_document');

Route::post('/add_images/', 'App\Http\Controllers\ImagesController@addImage')->name('add_image');

Route::get('/gallery/', 'App\Http\Controllers\ImagesController@showImages')->name('gallery');

Route::get('/news/', 'App\Http\Controllers\NewsController@showNews')->name('news');

Route::get('/boards/', 'App\Http\Controllers\BoardsController@showBoards')->name('boards');

Route::get('/news{id}/', 'App\Http\Controllers\NewsController@showOneNew')->name('news-one');

Route::get('/boards{id}/', 'App\Http\Controllers\BoardsController@showOneBoard')->name('boards-one');

Route::get('/admin_users/', 'App\Http\Controllers\AdminController@showUsers')->name('admin_users');

Route::get('/admin_news/', 'App\Http\Controllers\NewsController@showNewsAdmin')->name('admin_news');

Route::get('/admin_boards/', 'App\Http\Controllers\BoardsController@showBoardsAdmin')->name('admin_boards');

Route::get('/admin_docs/', 'App\Http\Controllers\DocumentsController@showDocsAdmin')->name('admin_docs');

Route::get('/admin_images/', 'App\Http\Controllers\ImagesController@showImagesAdmin')->name('admin_images');

Route::get('/admin_users/', 'App\Http\Controllers\UserController@showUsersAdmin')->name('admin_users');

Route::get('/admin_news_update{id}/', 'App\Http\Controllers\NewsController@adminNewsUpdate')->name('admin_news_update');

Route::post('/admin_news_update{id}/', 'App\Http\Controllers\NewsController@adminNewsUpdateSave')->name('admin_news_update_save');

Route::get('/admin_boards_update{id}/', 'App\Http\Controllers\BoardsController@adminBoardsUpdate')->name('admin_boards_update');

Route::post('/admin_boards_update{id}/', 'App\Http\Controllers\BoardsController@adminBoardsUpdateSave')->name('admin_boards_update_save');

Route::get('/admin_news_delete{id}/', 'App\Http\Controllers\NewsController@adminNewsDelete')->name('admin_news_delete');

Route::get('/admin_boards_delete{id}/', 'App\Http\Controllers\BoardsController@adminBoardsDelete')->name('admin_boards_delete');

Route::get('/admin_docs_delete{id}/', 'App\Http\Controllers\DocumentsController@adminDocsDelete')->name('admin_docs_delete');

Route::get('/admin_images_delete{id}/', 'App\Http\Controllers\ImagesController@adminImagesDelete')->name('admin_images_delete');

Route::post('/add_message/', 'App\Http\Controllers\MessageController@addMainMessage')->name('add_message');

Route::get('/admin/', 'App\Http\Controllers\MessageController@showMessagesAdmin')->name('admin');

Route::get('/admin_update{id}/', 'App\Http\Controllers\MessageController@adminUpdate')->name('admin_update');

Route::post('/admin_update{id}/', 'App\Http\Controllers\MessageController@adminUpdateSave')->name('admin_update_save');

Route::get('/admin_delete{id}/', 'App\Http\Controllers\MessageController@adminDelete')->name('admin_delete');

Route::get('/', 'App\Http\Controllers\MessageController@showMessagesPublic')->name('index');




