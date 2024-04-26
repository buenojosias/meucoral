<?php

use App\Http\Middleware\ManagerAccess;
use Illuminate\Support\Facades\Route;

Route::name('panel.')->middleware(['auth', ManagerAccess::class])->group(function () {
    // Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('corais', App\Livewire\Panel\Choir\ListChoir::class)->name('choirs.index');
    // Route::get('/', function() {
    //     dump('Estou no grupo gestão');
    //     dump(\Auth::user());
    // })->name('index');

    Route::view('perfil', 'profile')->middleware(['auth'])->name('profile');
});
