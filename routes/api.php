<?php

use App\Http\Controllers\APIController;
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

Route::get('/get-tokens', [APIController::class , 'get_tokens']);
Route::post('/validate-mail', [APIController::class , 'validate_mail']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
