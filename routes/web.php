<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoJobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login',[LoginController::class,'authenticate']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/todoList', [TodoJobController::class, 'getByUserId']);

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/loggedIn', function () {
    return view('loggedIn');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup',[RegisterController::class,'register']);

Route::get('/createTodo',function (){
    return view('createTodo');
});

Route::post('/createTodo',[TodoJobController::class,'createTodo'])
->middleware('auth');
