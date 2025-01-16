<?php

use App\Http\Middleware\AdminAccess;
use App\Livewire\Admin\Choir\ChoirIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminAccess::class])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('usuarios', UserIndex::class)->name('users.index');
    Route::get('corais', ChoirIndex::class)->name('choirs.index');
});
