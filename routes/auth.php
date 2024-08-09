<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Volt\Volt;

Route::redirect('/login', '/auth/login')->name('login');

Route::middleware('guest')->name('auth.')->group(function () {
    Volt::route('/auth/cadastro', 'pages.auth.register')
        ->name('register');

    Volt::route('/auth/login', 'pages.auth.login')
        ->name('login');

    Volt::route('/auth/esqueci-senha', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('/auth/resetar-senha/{token}', 'pages.auth.reset-password')
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

        return redirect()->route('home');
    });
});

Route::middleware('auth')->group(function () {
    Volt::route('verificar-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verificar-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirmar-senha', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
