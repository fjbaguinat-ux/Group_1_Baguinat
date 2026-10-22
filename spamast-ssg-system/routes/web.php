<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanctionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sanctions', SanctionController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);
