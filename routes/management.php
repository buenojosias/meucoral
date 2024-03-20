<?php

use App\Http\Middleware\ManagerAccess;
use Illuminate\Support\Facades\Route;

Route::prefix('gestao')->name('management.')->middleware(['auth', ManagerAccess::class])->group(function () {
    Route::get('/', function() {
        dump('Estou no grupo gestão');
        dump(\Auth::user());
    })->name('index');
});
