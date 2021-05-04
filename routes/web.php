<?php

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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    
    /*Routes de Cursos */
Route::get('/cursos/index', [App\Http\Controllers\CursController::class, 'index'])->name('index');
Route::get('/cursos/create', [App\Http\Controllers\CursController::class, 'create'])->name('create');
Route::post('/cursos/create', [App\Http\Controllers\CursController::class, 'insert'])->name('insert');
Route::post('/cursos/edit', [App\Http\Controllers\CursController::class, 'update'])->name('update');
Route::get('/cursos/edit/{id}', [App\Http\Controllers\CursController::class, 'edit'])->name('edit');
Route::get('/cursos/delete/{id}', [App\Http\Controllers\CursController::class, 'delete'])->name('delete');

});

