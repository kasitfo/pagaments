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

Route::get('pagaments/info/{id}', [App\Http\Controllers\PagamentController::class, 'show'])->name('show');

Auth::routes();

Route::middleware(['auth'])->group(function(){

    /* Routes de Users */
Route::get('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
Route::post('/users/create', [App\Http\Controllers\UserController::class, 'insert'])->name('insert');
Route::post('/users/edit', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
Route::get('/users/imprimir', [App\Http\Controllers\UserController::class, 'imprimir'])->name('imprimir');

    /* Routes de Pagaments */
Route::get('/pagaments/index', [App\Http\Controllers\PagamentController::class, 'index'])->name('index');
Route::get('/pagaments/create', [App\Http\Controllers\PagamentController::class, 'create'])->name('create');
Route::post('/pagaments/create', [App\Http\Controllers\PagamentController::class, 'insert'])->name('insert');
Route::post('/pagaments/edit', [App\Http\Controllers\PagamentController::class, 'update'])->name('update');
Route::get('/pagaments/edit/{id}', [App\Http\Controllers\PagamentController::class, 'edit'])->name('edit');
Route::get('/pagaments/delete/{id}', [App\Http\Controllers\PagamentController::class, 'delete'])->name('delete');

    /* Routes de Cursos */
Route::get('/cursos/index', [App\Http\Controllers\CursController::class, 'index'])->name('index');
Route::get('/cursos/create', [App\Http\Controllers\CursController::class, 'create'])->name('create');
Route::post('/cursos/create', [App\Http\Controllers\CursController::class, 'insert'])->name('insert');
Route::post('/cursos/edit', [App\Http\Controllers\CursController::class, 'update'])->name('update');
Route::get('/cursos/edit/{id}', [App\Http\Controllers\CursController::class, 'edit'])->name('edit');
Route::get('/cursos/delete/{id}', [App\Http\Controllers\CursController::class, 'delete'])->name('delete');
Route::get('/cursos/imprimir', [App\Http\Controllers\CursController::class, 'imprimir'])->name('imprimir');

    /* Routes de Categories*/
Route::get('/categories/index', [App\Http\Controllers\CategoriaController::class, 'index'])->name('index');
Route::get('/categories/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('create');
Route::post('/categories/create', [App\Http\Controllers\CategoriaController::class, 'insert'])->name('insert');
Route::post('/categories/edit', [App\Http\Controllers\CategoriaController::class, 'update'])->name('update');
Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('edit');
Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoriaController::class, 'delete'])->name('delete');
Route::get('/categories/imprimir', [App\Http\Controllers\CategoriaController::class, 'imprimir'])->name('imprimir');

    /* Routes de Comptes*/
Route::get('/comptes/index', [App\Http\Controllers\CompteController::class, 'index'])->name('index');
Route::get('/comptes/create', [App\Http\Controllers\CompteController::class, 'create'])->name('create');
Route::post('/comptes/create', [App\Http\Controllers\CompteController::class, 'insert'])->name('insert');
Route::post('/comptes/edit', [App\Http\Controllers\CompteController::class, 'update'])->name('update');
Route::get('/comptes/edit/{id}', [App\Http\Controllers\CompteController::class, 'edit'])->name('edit');
Route::get('/comptes/delete/{id}', [App\Http\Controllers\CompteController::class, 'delete'])->name('delete');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


});

