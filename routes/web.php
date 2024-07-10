<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//shows
Route::get('shows/show-details/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'animeDetails'])->name('anime.details');

//comments
Route::post('shows/insert-comments/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'insertComments'])->name('anime.insert.comments');

//following
Route::post('shows/follow/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'follow'])->name('anime.follow');

//episodes
Route::get('shows/anime-watching/{show_id}/{episode_id}', [App\Http\Controllers\Anime\AnimeController::class, 'animeWatching'])->name('anime.watching');

//categories
Route::get('shows/category/{category_name}', [App\Http\Controllers\Anime\AnimeController::class, 'category'])->name('anime.category');

//users 'users followed shows'
Route::get('users/followed-shows', [App\Http\Controllers\Users\UsersController::class, 'followedShows'])->name('users.followed.shows');