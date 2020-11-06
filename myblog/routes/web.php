<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//urlにスラッシュ/を付けてgetでアクセスした時のルーティングとその後に行いたい処理(今回はPostsControllerのindexアクション)
//今回はターミナルで、php artisan make::controller PostsControllerと入力し、Controller作成
Route::get('/', 'PostsController@index');
//postsの1や2を処理したい際に、{変数名}とすればControllerに渡せる
// Route::get('/posts/{id}', 'PostsController@show');
//Implicit Binding 暗黙的にidでモデルを引っ張ってくる
// {{-- whereで数字限定にすることでこの順番でもcreateが{post}の値だと認識されない --}}
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+'); 
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');