<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('/auth/register', 'pages.auth.register')
        ->name('register');

    Volt::route('/auth/login', 'pages.auth.login')
        ->name('login');

    Volt::route('/auth/forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('/auth/reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');

    Route::get('/auth/{provider}/redirect', function (string $provider) {
        return Socialite::driver($provider)->redirect();
    });

    Route::get('/auth/{provider}/callback', function (string $provider) {
        $providerUser = Socialite::driver($provider)->stateless()->user();

        $user = User::updateOrCreate([
            'email' => $providerUser->email,
        ], [
            'name' => $providerUser->name,
            'provider' => $provider,
            'provider_id' => $providerUser->id,
            'role' => 'manager',
        ]);

        Auth::login($user, $remember = true);

        return redirect()->route('welcome');
    });
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
