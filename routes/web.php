<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/users/{id}/{name}', function ($id, $name) {
//     return 'This is user '.$name.' with an id of '.$id;
// });

// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::get('/', [PagesController::class, 'index']);
Route::get('/home', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
// Route::get('/medicalHome', [PagesController::class, 'medicalHome']);
// Route::get('/companionHome', [PagesController::class, 'companionHome']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', Admin\UsersController::class, ['except' => ['show', 'create', 'store']]);
});

Route::prefix('profile')->name('profile.')->middleware('can:manage-profile')->group(function(){
    Route::resource('/users', ProfilesController::class);
});

Route::prefix('user')->name('user.')->middleware('can:user-only')->group(function(){
    Route::resource('/users', UsersController::class);
});

Route::prefix('medical')->name('medical.')->middleware('can:medical-function')->group(function(){
    Route::resource('/users', UsersController::class);
});