<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\UserProfileController;


use App\Http\Controllers\SubscriptionController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 

Route::resource('user_profiles', UserProfileController::class);
 

Route::get('/subscription', [SubscriptionController::class, 'showSubscriptionForm'])->name('subscription');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/subscription/success', [SubscriptionController::class, 'subscriptionSuccess'])->name('subscription.success');
Route::get('/subscription/cancel', [SubscriptionController::class, 'subscriptionCancel'])->name('subscription.cancel');