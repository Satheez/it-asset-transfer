<?php

use App\Livewire\FormDetails;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
//    Route::get('/forms', FormDetails::class)->name('forms.index');
    Route::get('/forms', [FormDetails::class, 'index'])->name('forms.index');

    Route::get('/forms/create', FormDetails::class)->name('forms.create');
    Route::get('/forms/{formId}/edit', FormDetails::class)->name('forms.edit');
});


require __DIR__.'/auth.php';
