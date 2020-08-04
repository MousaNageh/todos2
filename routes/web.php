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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 
Route::middleware(["auth"])->get("todo/{todo}/complete",'TodoController@complete')->name("todo.complete") ;
Route::middleware(["auth"])->resource('/todo', 'TodoController');
Route::middleware(["auth"])->resource("/user","UserController") ; 
