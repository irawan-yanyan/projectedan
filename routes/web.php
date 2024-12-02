<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PostController;

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

Route::get('/yanyan',function(){
    return "Hallo apakabar";
});

Route::get('/mahasiswa',[MahasiswaController::class,'hallo']); 
Route::get('/depedency',[MahasiswaController::class,'index']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/input/coba',[\App\Http\Controllers\InputController::class,'hello']);
Route::post('/input/coba',[\App\Http\Controllers\InputController::class,'hello']);

Route::post('/input/coba/first',[\App\Http\Controllers\InputController::class,'helloFirst']);
Route::post('/input/hello/input',[\App\Http\Controllers\InputController::class,'helloInput']);

Route::post('/input/hello/array',[\App\Http\Controllers\InputController::class,'arrayInput']);

Route::resource('/post', PostController::class)->except(['show']);
Route::get('/post/editpost/{idpost}',[PostController::class,'editPost'])->name('editpost');
Route::put('/post/updatepost/{idpost}',[PostController::class,'updatePost'])->name('updatepost');



