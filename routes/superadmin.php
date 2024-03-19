<?php

use App\Http\Middleware\SuperAdminAccess;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('sa.')->middleware(['auth', SuperAdminAccess::class])->group(function () {
    Route::get('/', function() {
        dump('Estou no grupo superadmin');
        dump(\Auth::user());
    })->name('index');
});
