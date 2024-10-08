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


//users 'users followed shows'
Route::get('users/followed-shows', [App\Http\Controllers\Users\UsersController::class, 'followedShows'])->name('users.followed.shows')->middleware('auth:web');


//admin panel
Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

Route::get('admin/logout', [App\Http\Controllers\Admins\AdminsController::class, 'adminLogout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');

    //admins
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.all');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('admins.store');

    //shows
    Route::get('/all-shows', [App\Http\Controllers\Admins\AdminsController::class, 'allShows'])->name('shows.all');
    Route::get('/create-shows', [App\Http\Controllers\Admins\AdminsController::class, 'createShows'])->name('shows.create');
    Route::post('/store-shows', [App\Http\Controllers\Admins\AdminsController::class, 'storeShows'])->name('shows.store');
    Route::get('/edit-shows/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editShows'])->name('shows.edit');
    Route::put('/update-shows/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateShows'])->name('shows.update');
    Route::get('/delete-shows/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteShows'])->name('shows.delete');

    //categories
    Route::get('/all-categories', [App\Http\Controllers\Admins\AdminsController::class, 'allCategories'])->name('categories.all');
    Route::get('/create-categories', [App\Http\Controllers\Admins\AdminsController::class, 'createCategories'])->name('categories.create');
    Route::post('/store-categories', [App\Http\Controllers\Admins\AdminsController::class, 'storeCategories'])->name('categories.store');
    Route::get('/delete-categories/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCategories'])->name('categories.delete');

    //episodes
    Route::get('/all-episodes', [App\Http\Controllers\Admins\AdminsController::class, 'allEpisodes'])->name('episodes.all');
    Route::get('/create-episodes', [App\Http\Controllers\Admins\AdminsController::class, 'createEpisodes'])->name('episodes.create');
    Route::post('/store-episodes', [App\Http\Controllers\Admins\AdminsController::class, 'storeEpisodes'])->name('episodes.store');
    Route::get('/edit-episodes/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editEpisodes'])->name('episodes.edit');
    Route::put('/update-episodes/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateEpisodes'])->name('episodes.update');
    Route::get('/delete-episodes/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteEpisodes'])->name('episodes.delete');

    //users
    Route::get('/all-users', [App\Http\Controllers\Admins\AdminsController::class, 'allUsers'])->name('users.all');

    //followings
    Route::get('/all-followings', [App\Http\Controllers\Admins\AdminsController::class, 'allFollowings'])->name('followings.all');

    //comments
    Route::get('/all-comments', [App\Http\Controllers\Admins\AdminsController::class, 'allComments'])->name('comments.all');

});