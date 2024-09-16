<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show']);

// Listing routes

Route::resource('listing', ListingController::class)
  ->only(['index', 'show']);
  

// Auth Routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

// User Account Routes
Route::resource('user-account', UserAccountController::class);

// Realtor Routes Grouping
Route::prefix('realtor')
->name('realtor.')
  ->middleware('auth')
  ->group(function () {
    Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])->withTrashed();
    Route::resource('listing', RealtorListingController::class)
      ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
      ->withTrashed();
    Route::resource('listing.image', RealtorListingImageController::class)->only(['create', 'store', 'destroy']);
  });