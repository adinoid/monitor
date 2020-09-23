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

// Route::get('/', function () {
//     return view('auth/login');
// });

Auth::routes();
// Route::get('/', 'LoginController@index');
Route::group(['middleware' => ['auth']], function () {
  Route::get('/', 'HomeController@index');

  Route::get('/server', 'ServerController@index');
  Route::get('/processor', 'ProcessorController@index');
  Route::get('/statusserver', 'StatusServerController@index');

  Route::get('/cek', 'CekController@index');

  Route::get('/monitor', 'MonitorController@index');
  Route::post('/page-visibility', 'MonitorController@updatePageVisibility');
});
Route::get('/home', 'HomeController@index');
