<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryAPIController;

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

Route::prefix('categories')->group(function(){
    Route::get('/', [CategoryAPIController::class, 'show']);
    Route::post('/', [CategoryAPIController::class, 'upload_price']);
    Route::post('/add', [CategoryAPIController::class, 'add_accordance']);
    Route::get('/prom', [CategoryAPIController::class, 'show_prom']);
    Route::patch('/prom/{id}', [CategoryAPIController::class, 'update_prom']);
    Route::get('/prom/load', [CategoryAPIController::class, 'load_prom_groups']);
});