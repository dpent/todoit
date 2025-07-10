<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/todoList', function () {
    return view('todoList');
});

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
