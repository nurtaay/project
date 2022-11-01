<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ResumeController;

Route::get('/',function(){
    return redirect()->route('posts.index');
});



Route::resource('posts',PostController::class);




//Auth::routes();\
Route::get('posts/category/{category}',[PostController::class,'postsByCat'])->name('posts.category')->middleware('auth');
Route::middleware('auth')->group(function(){
    Route::resource('posts',PostController::class)->except('index','show');
    Route::resource('resumes',ResumeController::class)->only('create','edit');
    Route::resource('comments',CommentController::class)->only('store','destroy');

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
});
Route::resource('posts',PostController::class)->only('index','show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register',[RegisterController::class,'create'])->name('register.form');
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::get('/login',[LoginController::class,'create'])->name('login.form');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::resource('resumes',ResumeController::class);
