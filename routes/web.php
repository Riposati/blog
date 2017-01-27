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

use Illuminate\Support\Facades\Auth;

/**
 *
 * Parte do usuário
 */

Route::get('/', ['as' => 'ver-todos-posts-usuarios', 'uses' => 'PostsController@usuarios']);
Route::get('/blog', ['as' => 'ver-todos-posts-usuarios', 'uses' => 'PostsController@usuarios']);
Route::get('/blog/form-comentario/{id}', 'ComentarioController@index');
Route::post('insereComentario', ['as' => 'blog/insereComentario', 'uses' => 'ComentarioController@create']);

/**
 *
 * Parte login
 *
 */

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', function (){

    Auth::logout();

    return redirect()->route('blog-admin/ver-todos-posts');
});


/***
 *
 * Parte admin blog
 */

    Route::group(['prefix' => '/blog-admin' , 'middleware' => 'auth'], function () {

        Route::get('/', ['as' => 'blog-admin/ver-todos-posts', 'uses' => 'PostsController@index']);
        Route::get('', ['as' => 'blog-admin/ver-todos-posts', 'uses' => 'PostsController@index']);
        Route::get('ver-post/{id}', 'PostsController@verPost');

        /**
         *
         * Rotas para deletar
         */
        Route::get('deleta-post/{id}', 'PostsController@deletaPost');
        Route::get('deleta-comment/{id}', 'ComentarioController@deletaComment');


        /**
         *
         * Rotas para inserir
         */
        Route::get('form-insere', 'PostsController@formularioInserePost');
        Route::post('insere', ['as' => 'blog/insere', 'uses' => 'PostsController@create']);

        /**
         *
         * Rotas para alterar
         */
        Route::get('update/{id}', ['as' => 'blog/update', 'uses' => 'PostsController@formularioAlteraPost']);
        Route::put('altera/{id}', ['as' => 'posts/edit', 'uses' => 'PostsController@alteraPost']);

    });

Auth::routes();

Route::get('/home', 'HomeController@index');
