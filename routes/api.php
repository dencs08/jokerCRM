<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\SystemUsersController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/client/{id}', [ClientsController::class, 'show']);
Route::delete('/client/{id}', [ClientsController::class, 'destroy']);
Route::get('/clients', [ClientsController::class, 'index']);
Route::get('/contracts', [ContractsController::class, 'index']);
Route::get('/appointments', [AppointmentsController::class, 'index']);
Route::get('/salesmen', [SystemUsersController::class, 'index']);
