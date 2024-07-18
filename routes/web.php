<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::get('arquivos/logos/{path}', [FileController::class, 'logo'])->name('files.logo');

require __DIR__.'/auth.php';

require __DIR__.'/panel.php';

require __DIR__.'/admin.php';
