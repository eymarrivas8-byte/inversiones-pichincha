<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditoController;

Route::get('/', [CreditoController::class, 'index']);

Route::post('/guardar', [CreditoController::class, 'guardar']);