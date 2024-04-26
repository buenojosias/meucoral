<?php

use App\Http\Middleware\AdminAccess;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminAccess::class])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
});
