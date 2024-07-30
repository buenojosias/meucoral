<?php

use App\Http\Middleware\ManagerAccess;
use App\Livewire\Panel\Choir\ChoirCreate;
use App\Livewire\Panel\Choir\ChoirEdit;
use App\Livewire\Panel\Choir\ChoirIndex;
use App\Livewire\Panel\Choir\ChoirShow;
use App\Livewire\Panel\Chorister\ChoristerIndex;
use App\Livewire\Panel\Group\GroupCreate;
use App\Livewire\Panel\Group\GroupEdit;
use App\Livewire\Panel\Group\GroupIndex;
use App\Livewire\Panel\Group\GroupShow;
use Illuminate\Support\Facades\Route;

Route::name('panel.')->middleware(['auth', ManagerAccess::class])->group(function () {
    // Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('corais', ChoirIndex::class)->name('choirs.index');
    Route::get('corais/cadastrar', ChoirCreate::class)->name('choirs.create');
    Route::get('corais/{choir}/editar', ChoirEdit::class)->name('choirs.edit');
    Route::get('corais/{choir}', ChoirShow::class)->name('choirs.show');
    Route::get('grupos', GroupIndex::class)->name('groups.index');
    Route::get('grupos/cadastrar', GroupCreate::class)->name('groups.create');
    Route::get('grupos/{group}/editar', GroupEdit::class)->name('groups.edit');
    Route::get('grupos/{group}', GroupShow::class)->name('groups.show');
    Route::get('coralistas', ChoristerIndex::class)->name('choristers.index');
    // Route::get('/', function() {
    //     dump('Estou no grupo gestão');
    //     dump(\Auth::user());
    // })->name('index');

    Route::view('perfil', 'profile')->middleware(['auth'])->name('profile');
});
