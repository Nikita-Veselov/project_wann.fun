<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


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


Route::resource('/', LinkController::class);

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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])
    ->name('dashboard');
    Route::get('/profile', [UserController::class, 'index'])
    ->name('profile');
});

Route::post('/registration', [RegistrationController::class, 'store']);

Route::post('/login', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'destroy']);

Route::post('/forgot-password', [UserController::class, 'reset'])->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {

    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),

        function ($user, $password) {
            $user->forceFill([
                'password' => $password
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('index')->with(['success' => __($status)])
                : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

Route::get('/{slug}', [LinkController::class, 'redirect']);



