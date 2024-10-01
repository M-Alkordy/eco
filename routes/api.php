<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\API\ConsultController;
use App\Http\Controllers\API\EmailController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/products', [ProductsController::class, 'index']);
Route::post('/emails/create', [EmailController::class, 'store']);
Route::post('/consult/create', [ConsultController::class, 'store']);
