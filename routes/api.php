<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SystemUsersController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\LoginController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/clients', [ClientsController::class, 'index']);
Route::get('/client/{id}', [ClientsController::class, 'show']);
Route::post('/client/add', [ClientsController::class, 'store']);
Route::delete('/client/{id}', [ClientsController::class, 'destroy']);

Route::get('/salesmen', [UsersController::class, 'index']);
Route::get('/salesman/{id}', [UsersController::class, 'show']);

Route::get('/appointments', [AppointmentsController::class, 'index']);
Route::get('/appointments/{id}', [AppointmentsController::class, 'show']);
Route::post('/appointment/add', [AppointmentsController::class, 'store']);
Route::delete('/appointment/{id}', [AppointmentsController::class, 'destroy']);

Route::get('/contracts', [ContractsController::class, 'index']);
Route::get('/contracts/{id}', [ContractsController::class, 'show']);
Route::post('/contract/add', [ContractsController::class, 'store']);
Route::delete('/contract/{id}', [ContractsController::class, 'destroy']);

Route::post('/clientcontact/add', [ClientContactController::class, 'store']);

Route::delete('/info/{id}', [ClientInfoController::class, 'destroy']);
Route::post('/info/add', [ClientInfoController::class, 'store']);