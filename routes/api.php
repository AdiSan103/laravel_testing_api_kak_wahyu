<?php

use App\Http\Controllers\DataController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/read', [DataController::class, 'read']);
Route::get('/detail/{id}', [DataController::class, 'detail']);
Route::post('/create', [DataController::class, 'create']);
Route::post('/update/{id}', [DataController::class, 'update']);
Route::post('/delete/{id}', [DataController::class, 'delete']);
