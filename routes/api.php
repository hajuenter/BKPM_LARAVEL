<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPendidikanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pendidikan', [ApiPendidikanController::class, 'getAll']);
Route::post('/pendidikan', [ApiPendidikanController::class, 'createPen']);
Route::put('/pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
Route::delete('/pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);
