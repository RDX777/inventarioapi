<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;

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

Route::post('/login', [AuthController::class, 'login'])
    ->name('post.login');

Route::middleware('auth:sanctum')->prefix('tokens')->group(function (){
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('get.tokens.user');

    Route::delete('/revoke', [AuthController::class, 'revoke'])
    ->name('delete.tokens.revoke');

});
