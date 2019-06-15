<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');

Route::get('/npcs', 'NpcController@index')->name('npcs');
Route::get('/npcdef/{id}', 'NpcController@show')->name('npcdef');

Route::get('/worldmap', 'MapController@index')->name('worldmap');
Route::get('/wilderness', 'MapController@wilderness')->name('wilderness');

Route::get('/faq', 'GeneralController@faq')->name('faq');

Route::resource('news', 'News_PostController');
Route::resource('news_responses', 'News_ResponseController', ['except' => ['index', 'create', 'show']]);

Route::get('/profile/{user}', 'PageController@profile')->name('profile');

Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/contact', 'PageController@sendContact');

Auth::routes();
