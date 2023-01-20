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
Route::post('/client/add', [ClientsController::class, 'store']);

Route::get('/clients/{id}', [ClientsController::class, 'index']);

Route::get('/salesmen', [SystemusersController::class, 'index']);
Route::get('/salesman/{id}', [SystemusersController::class, 'show']);

Route::get('/appointments/{id}', [AppointmentsController::class, 'show']);
Route::delete('/appointment/{id}', [AppointmentsController::class, 'destroy']);

Route::get('/contracts/{id}', [ContractsController::class, 'show']);
Route::get('/contracts', [ContractsController::class, 'index']);
Route::delete('/contract/{id}', [ContractsController::class, 'destroy']);

Route::get('/appointments', [AppointmentsController::class, 'index']);
Route::get('/salesmen', [SystemUsersController::class, 'index']);
