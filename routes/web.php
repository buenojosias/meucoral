<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

require __DIR__.'/auth.php';

require __DIR__.'/panel.php';

require __DIR__.'/admin.php';
