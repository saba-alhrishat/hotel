<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FLUTTER****************************************************

use App\Http\Controllers\AdminController;




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


// FLUTTER****************************************************


Route::get('/rooms', [AdminController::class, 'api_rooms']);
