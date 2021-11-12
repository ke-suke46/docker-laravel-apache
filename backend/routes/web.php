<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\MemoController;

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
//     return view('welcome');
// });

Route::middleware('auth:users')->group(function(){
    Route::get('/', [MemoController::class,'showHome'])->name('home');
    Route::get('submit/{id?}', [MemoController::class,'showSubmit'])->name('submit');
    Route::post('submit/{id?}', [MemoController::class,'postSubmit'])->name('submit');
    Route::get('todo/create',[MemoController::class,'create'])->name('todo.create');
    Route::post('todo', [MemoController::class,'store'])->name('todo.store');
    Route::get('todo/{id}', [MemoController::class,'show'])->name('todo.show');
    Route::get('todo/{id}/edit', [MemoController::class,'edit'])->name('todo.edit');
    Route::put('todo/{id}', [MemoController::class,'update'])->name('todo.update');
    Route::delete('home/{id}', [MemoController::class,'delete'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\MemoController::class, 'showHome'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\MemoController::class, 'showHome'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\MemoController::class, 'showHome'])->name('home');

Route::get('/logout', [App\Http\Controllers\MemoController::class, 'logout'])->name('logout');
