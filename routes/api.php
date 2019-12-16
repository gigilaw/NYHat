<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', 'API\UserController@index')->name('users.index');
Route::post('{nameCode}/register', 'API\UserController@register')->name('users.register');

Route::get('/tournaments', 'API\TournamentController@index')->name('tournaments.index');
Route::get('/{nameCode}/participants', 'API\TournamentController@participants')->name('tournament.participants');

Route::get('/payments', 'API\PaymentController@index')->name('payments.index');
Route::post('/payments', 'API\PaymentController@update')->name('payments.update');
