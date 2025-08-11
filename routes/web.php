<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view("home");
})->name('home');

Route::get('/login', function () {
    return view('login_register');
})->name('login-register');

Route::post('/register',[RegisterController::class,'register']);

Route::post('/login',[RegisterController::class,'login']);

Route::get('/dashboardP', function () {
    return view('dashboardP');
});

Route::get('/forgot-password',function(){
    return view('password_forgot');
});

Route::post('/forgot-password',[RegisterController::class,'forgotPassword']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// require __DIR__.'/auth.php';
