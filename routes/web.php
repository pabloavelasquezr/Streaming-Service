<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::group(['prefix' => 'shows'], function () {


    Route::get('shows/show-details/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'animeDetails'])->name('anime.details');
    Route::post('shows/insert-comments/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'insertComments'])->name('anime.insert.comments');
    //following
    Route::post('shows/follow/{id}', [App\Http\Controllers\Anime\AnimeController::class, 'follow'])->name('anime.follow');

    //episodes
    Route::get('shows/anime-watching/{show_id}/{episode_id}', [App\Http\Controllers\Anime\AnimeController::class, 'animeWatching'])->name('anime.watching');

    //categories
    Route::get('shows/category/{category_name}', [App\Http\Controllers\Anime\AnimeController::class, 'category'])->name('anime.category');

    //search shows
    Route::any('shows/search', [App\Http\Controllers\Anime\AnimeController::class, 'searchShows'])->name('anime.search.shows');
});
//shows

//comments


//users 'users followed shows'
Route::get('users/followed-shows', [App\Http\Controllers\Users\UsersController::class, 'followedShows'])->name('users.followed.shows')->middleware('auth:web');