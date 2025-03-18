<?php

use App\Http\Controllers\Client\CreateController;
use App\Http\Controllers\Client\DeleteController;
use App\Http\Controllers\Client\GetAllController;
use App\Http\Controllers\Client\UpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function (): void {
    Route::post('create', [CreateController::class, 'action']);
    Route::get('list', [GetAllController::class, 'action']);
    Route::put('edit/{slug}', [UpdateController::class, 'action']);
    Route::delete('delete/{slug}', [DeleteController::class, 'action']);
});
