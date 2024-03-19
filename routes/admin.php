<?php

use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', AdminAccess::class])->group(function () {
    Route::get('/', function() {
        dump('Estou no grupo admin');
        dump(\Auth::user());
    })->name('index');
});
