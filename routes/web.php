<?php

use Illuminate\Support\Facades\Route;

Route::get('/gallery/', function () {
    return view('gallery');
})->name('gallery');

Route::get('/weather/', function () {
    return view('weather');
})->name('weather');

Route::get('/letter/', function () {
    return view('letter');
})->name('letter');


Route::get('/', 'App\Http\Controllers\MessageController@showMessagesPublic')
    ->name('index');

Route::get('/authorization{forum?}/', 'App\Http\Controllers\UserController@redirectAfterAuthorize')
    ->name('authorization');

Route::get('/gallery/', 'App\Http\Controllers\ImagesController@showImages')
    ->name('gallery');

Route::get('/news/', 'App\Http\Controllers\NewsController@showNews')
    ->name('news');

Route::get('/boards/', 'App\Http\Controllers\BoardsController@showBoards')
    ->name('boards');

Route::get('/news{id}/', 'App\Http\Controllers\NewsController@showOneNew')
    ->name('news-one');

Route::get('/boards{id}/', 'App\Http\Controllers\BoardsController@showOneBoard')
    ->name('boards-one');

Route::get('/get_documents{section}', 'App\Http\Controllers\DocumentsController@getDocuments')
    ->name('get_documents');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/', 'App\Http\Controllers\MessageController@showMessagesAdmin')
        ->name('admin');

    Route::post('/add_message/', 'App\Http\Controllers\MessageController@addMainMessage')
        ->name('add_message');

    Route::post('/add_new/', 'App\Http\Controllers\NewsController@addNew')
        ->name('add_new');

    Route::post('/add_board/', 'App\Http\Controllers\BoardsController@addBoard')
        ->name('add_board');

    Route::post('/add_document/', 'App\Http\Controllers\DocumentsController@addDocument')
        ->name('add_document');

    Route::post('/add_images/', 'App\Http\Controllers\ImagesController@addImage')
        ->name('add_image');

    Route::get('/admin_news/', 'App\Http\Controllers\NewsController@showNewsAdmin')
        ->name('admin_news');

    Route::get('/admin_boards/', 'App\Http\Controllers\BoardsController@showBoardsAdmin')
        ->name('admin_boards');

    Route::get('/admin_docs/', 'App\Http\Controllers\DocumentsController@showDocsAdmin')
        ->name('admin_docs');

    Route::get('/admin_images/', 'App\Http\Controllers\ImagesController@showImagesAdmin')
        ->name('admin_images');

    Route::get('/admin_users/', 'App\Http\Controllers\UserController@showUsersAdmin')
        ->name('admin_users');

    Route::get('/admin_indications/', 'App\Http\Controllers\UserController@showIndicationsAdmin')
        ->name('admin_indications');

    Route::get('/admin_news_update{id}/', 'App\Http\Controllers\NewsController@adminNewsUpdate')
        ->name('admin_news_update');

    Route::post('/admin_news_update{id}/', 'App\Http\Controllers\NewsController@adminNewsUpdateSave')
        ->name('admin_news_update_save');

    Route::get('/admin_boards_update{id}/', 'App\Http\Controllers\BoardsController@adminBoardsUpdate')
        ->name('admin_boards_update');

    Route::post('/admin_boards_update{id}/', 'App\Http\Controllers\BoardsController@adminBoardsUpdateSave')
        ->name('admin_boards_update_save');

    Route::get('/admin_update{id}/', 'App\Http\Controllers\MessageController@adminUpdate')
        ->name('admin_update');

    Route::post('/admin_update{id}/', 'App\Http\Controllers\MessageController@adminUpdateSave')
        ->name('admin_update_save');

    Route::get('/admin_news_delete{id}/', 'App\Http\Controllers\NewsController@adminNewsDelete')
        ->name('admin_news_delete');

    Route::get('/admin_boards_delete{id}/', 'App\Http\Controllers\BoardsController@adminBoardsDelete')
        ->name('admin_boards_delete');

    Route::get('/admin_docs_delete{id}/', 'App\Http\Controllers\DocumentsController@adminDocsDelete')
        ->name('admin_docs_delete');

    Route::get('/admin_images_delete{id}/', 'App\Http\Controllers\ImagesController@adminImagesDelete')
        ->name('admin_images_delete');

    Route::get('/admin_delete{id}/', 'App\Http\Controllers\MessageController@adminDelete')
        ->name('admin_delete');

    Route::get('/delete_user{id}/', 'App\Http\Controllers\UserController@adminUserDelete')
        ->name('delete_user');

    Route::get('/admin_indication_delete{id}/', 'App\Http\Controllers\UserController@indicationDeleteAdmin')
        ->name('admin_indication_delete');

    Route::get('/admin_forum/', 'App\Http\Controllers\ForumController@adminShowForums')
        ->name('admin_forum');

    Route::post('/add_forum/', 'App\Http\Controllers\ForumController@addForum')
        ->name('add_forum');

    Route::get('/admin_forum_delete{topic}/', 'App\Http\Controllers\ForumController@adminForumDelete')
        ->name('admin_forum_delete');

    Route::get('/delete_discuss_message{id}/{topic}/', 'App\Http\Controllers\ForumController@deleteDiscussMessage')
        ->name('delete_discuss_message');


});

Route::group(['middleware' => ['role:user']], function () {

    Route::get('/user/', 'App\Http\Controllers\UserController@showWaterIndications')
        ->name('user');

    Route::get('/user_energy/', 'App\Http\Controllers\UserController@showEnergyIndications')
        ->name('user_energy');

    Route::get('/add_water/', 'App\Http\Controllers\UserController@userAddWater')
        ->name('add_water');

    Route::get('/add_energy/', 'App\Http\Controllers\UserController@userAddEnergy')
        ->name('add_energy');

    Route::get('/water_indication_update{id}/', 'App\Http\Controllers\UserController@waterIndicationUpdate')
        ->name('water_indication_update');

    Route::post('/water_indication_update{id}/', 'App\Http\Controllers\UserController@waterIndUpdateSave')
        ->name('water_indication_save');

    Route::get('/energy_indication_update{id}/', 'App\Http\Controllers\UserController@energyIndicationUpdate')
        ->name('energy_indication_update');

    Route::post('/energy_indication_update{id}/', 'App\Http\Controllers\UserController@energyIndUpdateSave')
        ->name('energy_indication_save');

    Route::get('/water_indication_delete{id}/', 'App\Http\Controllers\UserController@waterIndicationDelete')
        ->name('water_indication_delete');

    Route::get('/energy_indication_delete{id}/', 'App\Http\Controllers\UserController@energyIndicationDelete')
        ->name('energy_indication_delete');
});

Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/forum/', 'App\Http\Controllers\ForumController@showForumsTopicPublic')
        ->name('forum');

    Route::get('/discuss{topic}/', 'App\Http\Controllers\ForumController@showDiscuss')
        ->name('discuss');

    Route::post('/add_discuss_message/', 'App\Http\Controllers\ForumController@addDiscussMessage')
        ->name('add_discuss_message');

});
