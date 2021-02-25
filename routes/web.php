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
    Route::resource('/users', MedicalsController::class);
});

Route::prefix('order')->name('order.')->middleware('can:medical-function')->group(function(){
    Route::resource('/users', OrdersController::class);
});

Route::prefix('report')->name('report.')->middleware('can:medical-function')->group(function(){
    Route::resource('/users', ReportsController::class);
});

Route::prefix('withdrawal')->name('withdrawal.')->middleware('can:medical-function')->group(function(){
    Route::resource('/users', WithdrawalsController::class);
});

Route::get('/sentorders', [OrdersController::class, 'showSentOrders'])->name('orders.sent');
Route::get('/receivedorders', [OrdersController::class, 'showReceivedOrders'])->name('orders.received');
Route::get('/allorders', [OrdersController::class, 'showAllOrders'])->middleware('can:manage-users')->name('orders.all');

Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout.index');
Route::post('/transaction', [CheckoutController::class, 'makePayment'])->name('make-payment');

Route::get('/admin/pdf', [Admin\UsersController::class, 'createPDF']);
Route::get('/withdrawals/pdf', [WithdrawalsController::class, 'createPDF']);
Route::get('/orders/pdf', [OrdersController::class, 'createPDF']);

Route::get('change-password', [ChangePasswordController::class, 'Index'])->name('changepwd.index');
Route::post('change-password', [ChangePasswordController::class, 'Store'])->name('change.password');

Route::get('/allwithdrawals', [WithdrawalsController::class, 'showAllWithdrawals'])->middleware('can:admin-only')->name('withdrawals.all');