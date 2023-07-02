<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/couriers/{courierName}/waybill', [CourierController::class, 'createWaybill']);
Route::get('/couriers/{courierName}/waybill/{waybillId}/print', [CourierController::class, 'printWaybillLabel']);
Route::get('/couriers/{courierName}/waybill/{waybillId}/status', [CourierController::class, 'trackShipmentStatus']);
Route::post('/couriers/{courierName}/status-mapping', [CourierController::class, 'mapStatuses']);
Route::post('/couriers/{courierName}/cancel', [CourierController::class, 'cancel']);
