<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('shows/show-details/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'animeDetails'])->name('anime.details');


Route::post('shows/insert-comments/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'insertComments'])->name('anime.insert.comments');

Route::post('shows/follow/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'follow'])->name('anime.follow');