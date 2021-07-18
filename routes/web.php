<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\RegistrationController;
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
    return view('main');
})->name('main');

Route::get('/away', function () {
    return view('main');
})->name('away');

Route::resource('/main', LinkController::class);

 
Route::group(['prefix' => 'link', 'as' => 'link.'], function() {
    Route::get('/destroy/{id}', [LinkController::class, 'destroy'])
        ->name('destroy');
    Route::get('/edit/{id}', [LinkController::class, 'edit'])
        ->name('edit');
    Route::get('/update/{id}', [LinkController::class, 'update'])
        ->name('update'); 
    Route::get('/show/{id}', [LinkController::class, 'show'])
        ->name('show');  
    Route::get('/getStats/{id}', [LinkController::class, 'getStats'])
        ->name('getStats'); 
});

Route::get('/profile', [UserController::class, 'index'])
    ->name('profile'); 

Route::post('/registration', [RegistrationController::class, 'store']);

Route::post('/login', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'destroy']);

Route::get('/{slug}', [LinkController::class, 'redirect']);


Route::get('chart', [ChartController::class, 'index'])->name('api.chart');