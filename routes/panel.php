<?php

use App\Http\Controllers\Panel\ResourceAttemptController;
use App\Http\Middleware\ManagerAccess;
use App\Livewire\Panel\Category\CategoryIndex;
use App\Livewire\Panel\Chorister\ChoristerEdit;
use App\Livewire\Panel\Choir\ChoirCreate;
use App\Livewire\Panel\Choir\ChoirEdit;
use App\Livewire\Panel\Choir\ChoirIndex;
use App\Livewire\Panel\Choir\ChoirShow;
use App\Livewire\Panel\Chorister\ChoristerCreate;
use App\Livewire\Panel\Chorister\ChoristerIndex;
use App\Livewire\Panel\Chorister\ChoristerShow;
use App\Livewire\Panel\Encounter\EncounterCreate;
use App\Livewire\Panel\Encounter\EncounterEdit;
use App\Livewire\Panel\Encounter\EncounterIndex;
use App\Livewire\Panel\Encounter\EncounterShow;
use App\Livewire\Panel\Event\EventCreate;
use App\Livewire\Panel\Event\EventEdit;
use App\Livewire\Panel\Event\EventIndex;
use App\Livewire\Panel\Event\EventShow;
use App\Livewire\Panel\Group\GroupCreate;
use App\Livewire\Panel\Group\GroupEdit;
use App\Livewire\Panel\Group\GroupIndex;
use App\Livewire\Panel\Group\GroupShow;
use App\Livewire\Panel\Song\SongCreate;
use App\Livewire\Panel\Song\SongEdit;
use App\Livewire\Panel\Song\SongIndex;
use App\Livewire\Panel\Song\SongShow;
use App\Models\ResourceAttempt;
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

    Route::get('coralistas/cadastrar', ChoristerCreate::class)->name('choristers.create');
    Route::get('coralistas', ChoristerIndex::class)->name('choristers.index');
    Route::get('coralistas/{chorister}', ChoristerShow::class)->name('choristers.show');
    Route::get('coralistas/{chorister}/editar', ChoristerEdit::class)->name('choristers.edit');

    Route::get('ensaios', EncounterIndex::class)->name('encounters.index');
    Route::get('ensaios/adicionar', EncounterCreate::class)->name('encounters.create');
    Route::get('ensaios/{encounter}', EncounterShow::class)->name('encounters.show');
    Route::get('ensaios/{encounter}/editar', EncounterEdit::class)->name('encounters.edit');

    Route::get('eventos', EventIndex::class)->name('events.index');
    Route::get('eventos/agendar', EventCreate::class)->name('events.create');
    Route::get('eventos/{event}', EventShow::class)->name('events.show');
    Route::get('eventos/{event}/editar', EventEdit::class)->name('events.edit');

    Route::get('musicas', SongIndex::class)->name('songs.index');
    Route::get('musicas/cadastrar', SongCreate::class)->name('songs.create');
    Route::get('musicas/categorias', CategoryIndex::class)->name('songs.categories');
    Route::get('musicas/{song}', SongShow::class)->name('songs.show');
    Route::get('musicas/{song}/editar', SongEdit::class)->name('songs.edit');

    Route::view('perfil', 'profile')->middleware(['auth'])->name('profile');

    Route::get('attempt', ResourceAttemptController::class)->name('resource-attempt');
});
