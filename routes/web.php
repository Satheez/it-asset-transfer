<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Forms\ItTransferForm;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
//    Route::get('/forms', FormDetails::class)->name('forms.index');
    Route::get('/it-transfers', [ItTransferForm::class, 'index'])->name('it-transfers.index');

    Route::get('/it-transfers/create', ItTransferForm::class)->name('it-transfers.create');
    Route::get('/it-transfers/{formId}/edit', ItTransferForm::class)->name('it-transfers.edit');
});


require __DIR__.'/auth.php';
