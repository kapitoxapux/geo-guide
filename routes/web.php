<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
});

Route::get('/geodesy', 'ZadachaController@geodesy');
Route::get('/geodesy/{id}', 'ZadachaController@index');
Route::get('/geology', 'ZadachaController@geology');
Route::get('/geology/{id}', 'ZadachaController@index');
Route::get('/hydraulics', 'ZadachaController@hydraulics');
Route::get('/hydraulics/{id}', 'ZadachaController@index');
Route::get('/basket', 'ZadachaController@basket');

Route::get('/home', 'CabinetController@index');

Route::post('/image', 'ZadachaController@image')->name('image');

Route::resource('zadacha', 'ZadachaController');

/* Sitemap */
Route::get('/sitemap', 'SitemapController@index');
//Route::get('/sitemap/posts', 'SitemapController@posts');
//Route::get('/sitemap/categories', 'SitemapController@categories');
//Route::get('/sitemap/tags', 'SitemapController@tags');

Auth::routes();
