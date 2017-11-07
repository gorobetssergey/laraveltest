<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles', 'ArticleController@index')->name('articles');

Route::get('/article/create', 'ArticleController@create')
    ->name('article.create')
    ->middleware('can:create,App\Models\Article');
Route::post('/article/store', 'ArticleController@store')->name('article.store');
Route::get('/article/edit/{article}', 'ArticleController@edit')
    ->name('article.edit')
    ->middleware('can:edit,article');
Route::post('/article/update/{article}', 'ArticleController@update')
    ->name('article.update')
    ->middleware('can:update,article');

//facebook

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');;
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback')->name('facebook.callback');