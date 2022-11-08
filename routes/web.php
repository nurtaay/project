c<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Adm\UserController;


Route::get('/',function(){
    return redirect()->route('posts.index');
});



Route::resource('posts',PostController::class);

//Route::middleware('hasrole:moderator')->group(function(){
//    //admin kiretin routtar
//});


//Auth::routes();\
Route::get('posts/category/{category}',[PostController::class,'postsByCat'])->name('posts.category');
Route::middleware('auth')->group(function(){
    Route::resource('posts',PostController::class)->except('index','show');
    Route::resource('resumes',ResumeController::class)->name('create','edit');
    Route::resource('comments',CommentController::class)->only('store','destroy');

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin')->group(function(){
        //admin kiretin routtar
        Route::get('/users',[UserController::class,'index'])->name('users.index');
        Route::get('/users/search',[UserController::class,'index'])->name('users.search');
        Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
        Route::put('/users/{user}/ban',[UserController::class,'ban'])->name('users.ban');
        Route::put('/users/{user}/unban',[UserController::class,'unban'])->name('users.unban');


    });
});
Route::resource('posts',PostController::class)->only('index','show');

//Route::get('/homepage',function(){
//    return view('Arsha.index.html');
//});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register',[RegisterController::class,'create'])->name('register.form');
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::get('/login',[LoginController::class,'create'])->name('login.form');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::resource('resumes',ResumeController::class);
