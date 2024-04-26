<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

require __DIR__.'/auth.php';

require __DIR__.'/management.php';

require __DIR__.'/admin.php';
