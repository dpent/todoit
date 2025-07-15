<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoJobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { //Home page
    return view('home');
});

Route::get('/login', function () { //Page where you enter credentials
    return view('login');
});

//Sends data for login approval
Route::post('/login',[LoginController::class,'authenticate']);

//Requests logout
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//Todolist page. Also queries the db for all TodoJobs belonging
//to the authenticated user
Route::get('/todoList', [TodoJobController::class, 'getByUserId']);

//Profile details page. Queries the db for authenticated user data
Route::get('/profile', function () {
    return view('profile');
});

//Where the user is redirected after being authenticated
Route::get('/loggedIn', function () {
    return view('loggedIn');
});

//Here the user enters credentials to create a new profiles
Route::get('/signup', function () {
    return view('signup');
});

//Sends data to the db in order to be saved
Route::post('/signup',[RegisterController::class,'register']);

//Gets the todoList creation form
Route::get('/createTodo',function (){
    return view('createTodo');
});

//Sends TodoJob data for creation
Route::post('/createTodo',[TodoJobController::class,'createTodo'])
->middleware('auth');

