<?php

use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DocumentMdataController;
use App\Http\Controllers\Api\DepartmentController;

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





Route::apiResource('users', UserController::class); // api resource for all users


Route::apiResource('documents', DocumentController::class); // api resource for all users

Route::apiResource('departments', DepartmentController::class); // api resource for all users


Route::apiResource('documentsMdatas', DocumentMdataController::class); // api resource for all users
