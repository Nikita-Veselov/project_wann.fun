<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return view('link');
})->name('link');

Route::get('/away', function () {
    return view('link');
})->name('away');

Route::resource('/link', LinkController::class);

Route::get('/profile', [UserController::class, 'auth'
])->name('profile'); 
// ->middleware('auth')

Route::get('/{any?}', [LinkController::class, 'show'])->where('any', '.*');




