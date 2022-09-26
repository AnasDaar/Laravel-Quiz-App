<?php

use App\Http\Controllers\questioncontroller;
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
Route::get('ansdesk', function () {
    return view('answerDesk');
});
Route::get('start', function () {
    return view('start');
});
Route::get('end', function () {
    return view('end');
});



Route::post('/add',[questioncontroller::class,'add']);
Route::post('/update',[questioncontroller::class,'update']);
Route::post('/delete',[questioncontroller::class,'delete']);
Route::any('/startquiz',[questioncontroller::class,'startquiz']);
Route::any('/submitans',[questioncontroller::class,'submitans']);
Route::any('/questions',[questioncontroller::class,'show']);