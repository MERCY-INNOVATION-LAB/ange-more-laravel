<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view("home");
})->name('home');

Route::get('/login', function () {
    return view('login_register');
})->name('login-register');

Route::post('/register',[RegisterController::class,'register']);

Route::post('/login',[RegisterController::class,'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/forgot-password',function(){
    return view('password_forgot');
});

Route::post('/forgot-password',[RegisterController::class,'forgotPassword']);

Route::get('/produits',function(){
    return view('products');
})->name('produit');

Route::get('/boutique-create',function(){
    return view('shop_form');
})->name('shop.create');

Route::post('/boutique-create',[ShopController::class,'store'])->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// require __DIR__.'/auth.php';
