<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\api\ComputerController;

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
Route::prefix('v1')->group(function () {

    Route::post('login', [AuthController::class, 'login'])
    ->name('post.login');

    Route::middleware('auth:sanctum')->prefix('tokens')->group(function (){
        
        Route::get('user', function (Request $request) {
            return $request->user();
        })->name('get.tokens.user');

        Route::get('tokenme', [AuthController::class, 'tokenme'])
        ->name('get.tokens.tokenme');

        Route::delete('revoke', [AuthController::class, 'revoke'])
        ->name('delete.tokens.revoke');

    });

    Route::middleware('auth:sanctum')->prefix('computers')->group(function (){
        
        Route::post('store', [ComputerController::class, 'store'])
        ->name('post.computers.store');

        Route::get('show/{id}', [ComputerController::class, 'show'])
        ->name('get.computers.show');

        Route::put('update', [ComputerController::class, 'update'])
        ->name('put.computers.update');

    });

});

