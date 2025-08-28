<?php

use App\Livewire\Sample\Records\{SampleRecordIndex, SampleRecordShow};
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/sample/records', SampleRecordIndex::class)->name('sample.records.index');
//    Route::get('/sample/records/create', SampleRecordCreate::class)->name('sample.records.create');
    Route::get('/sample/records/{record}', SampleRecordShow::class)->name('sample.records.show');
//    Route::get('/sample/records/{record}/edit', SampleRecordEdit::class)->name('sample.records.edit');
});

require __DIR__ . '/auth.php';
