<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\NotificationsController;

use Illuminate\Support\Facades\Route;
use App\Jobs\Test;

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

Route::get('testJob', function() {
    dispatch(new Test());
    return 'job ejecutado';
});

Route::get('/', 'App\Http\Controllers\MessagesController@create')->name('mensajes.create');
Route::resource('mensajes', MessagesController::class);

Route::middleware(['auth'])->group(function () {

    Route::get(
        'notifications/get',
        [NotificationsController::class, 'getNotificationsData']
    )->name('notifications.get');

    Route::resource('usuarios', UsersController::class);
    Route::put('usuarios-cambiaestado/{id}','App\Http\Controllers\UsersController@cambiaEstado')->name('usuarios.estado');   
    
    
    Route::get('mensajes/pdf', 'App\Http\Controllers\MessagesController@pdf')->name('mensajes.pdf');   
    
    Route::get('mensajes-exportar', 'App\Http\Controllers\MessagesController@export')->name('mensajes.export');
    Route::get('mensajes-importar', 'App\Http\Controllers\MessagesController@import')->name('mensajes.import');
    Route::post('mensajes-importar', 'App\Http\Controllers\MessagesController@import')->name('mensajes.import');
    
    Route::resource('roles', RolesController::class);
    Route::put('roles-cambiaestado/{id}','App\Http\Controllers\RolesController@cambiaEstado')->name('roles.estado');
    
    Route::resource('tags', TagsController::class);
    Route::resource('notas', NotesController::class);
    
    Route::get('componentes', 'App\Http\Controllers\PagesController@componentes')->name('componentes');
    
});


Route::get('documentacion', 'App\Http\Controllers\PagesController@docu')->name('docu');


//AJAX
Route::get('/get-nueva-nota', 'PrtiController@getClasificacionesCGCombo');

//******************************************************************************* */

Auth::routes();


