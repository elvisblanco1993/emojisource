<?php

use App\Http\Controllers\Api\v1\EmojiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * ----------------------------------------------------------
 * API version 1.0
 * ----------------------------------------------------------
 * This API only includes a single endpoint with search
 * capabilities, which throttles requests
 * to 100 every 1 minutes.
 */
Route::middleware('auth:sanctum')->group( function () {
    Route::middleware('throttle:100,1')->get('/v1/emojis', [EmojiController::class, 'index']);
});
