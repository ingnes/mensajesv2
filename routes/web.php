<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('test', function() {

    return \App\Models\User::with('mensajes')->get();
});

Route::resource('usuarios', UsersController::class);

Route::get('/', 'App\Http\Controllers\MessagesController@create')->name('mensajes.index');

Route::resource('mensajes', MessagesController::class);

Route::get('mensajes-exportar', 'App\Http\Controllers\MessagesController@export')->name('mensajes.export');
Route::get('mensajes-importar', 'App\Http\Controllers\MessagesController@import')->name('mensajes.import');
Route::post('mensajes-importar', 'App\Http\Controllers\MessagesController@import')->name('mensajes.import');


Route::get('documentacion', 'App\Http\Controllers\PagesController@docu')->name('docu');

Auth::routes();
