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

Auth::routes();

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/changepassword',function(){
    return view('changepassword');
})->name('changeassword');

Route::post('/changepassword', [App\Http\Controllers\ChangepasswordController::class, 'changepassword'])->name('changepassword');

Route::delete('task/{id}', [App\Http\Controllers\HomeController::class, 'deletetask'])->name('task.delete');

Route::post('/task', [App\Http\Controllers\HomeController::class, 'addtask'])->name('task.add');