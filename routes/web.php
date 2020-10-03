<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::view('/', 'home')->name('home');
Route::post('/', [ClientController::class, 'store'])->name('clients.store');
