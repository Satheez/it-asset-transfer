<?php

use App\Livewire\FormDetails;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\ItAssetTransferController;

Route::get('/forms', FormDetails::class)->name('forms.index');
Route::get('/forms/create', FormDetails::class)->name('forms.create');
Route::get('/forms/{formId}/edit', FormDetails::class)->name('forms.edit');

//Route::get('/', [ItAssetTransferController::class, 'index'])->name('forms.index');
//Route::get('/create', [ItAssetTransferController::class, 'create'])->name('forms.create');
//Route::post('/forms', [ItAssetTransferController::class, 'store'])->name('forms.store');
//Route::get('/{form}', [ItAssetTransferController::class, 'show'])->name('forms.show');
