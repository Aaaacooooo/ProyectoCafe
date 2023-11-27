<?php

use App\Http\Controllers\Api\V1\ModuloController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginRegisterController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('modulos', ModuloController::class);
});

// Public routes of authtication
Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// Public routes of Modulos
Route::controller(ModuloController::class)->group(function () {
    Route::get('/modulo', 'index');
    Route::get('/modulo/{id}', 'show');
    Route::get('/modulo /search/{name}', 'search');
});
// Public routes of product
// Protected routes of product and logout
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);

    Route::controller(ModuloController::class)->group(function () {
        Route::post('/modulo', 'store');
        Route::post('/modulo/{id}', 'update');
        Route::delete('/modulo/{id}', 'destroy');
    });
});



// Route::controller(ProductController::class)->group(function () {
//     Route::get('/products', 'index');
//     Route::get('/products/{id}', 'show');
//     Route::get('/products/search/{name}', 'search');
// });


// // Protected routes of product and logout
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/logout', [LoginRegisterController::class, 'logout']);

//     Route::controller(ProductController::class)->group(function () {
//         Route::post('/products', 'store');
//         Route::post('/products/{id}', 'update');
//         Route::delete('/products/{id}', 'destroy');
//     });
// });
