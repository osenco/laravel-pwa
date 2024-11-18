<?php

use Illuminate\Support\Facades\Route;
use LaravelPWA\Http\Controllers\LaravelPWAController;

Route:: as('laravelpwa.')->controller(LaravelPWAController::class)->group(function () {
    Route::get('/manifest.json', 'manifestJson')->name('manifest');
    Route::get('/offline/', 'offline')->name('offline');
});
