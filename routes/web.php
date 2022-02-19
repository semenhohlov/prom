<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// import
Route::get('/import', [ImportController::class, 'importForm']);
Route::post('/import', [ImportController::class, 'saveFile']);
// category
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'show']);
    Route::post('/', [CategoryController::class, 'import']);
    Route::get('/tree', [CategoryController::class, 'show_tree']);
    Route::get('/compare', [CategoryController::class, 'compare']);
    Route::post('/compare', [CategoryController::class, 'compare']);
});

// product
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'show']);
    Route::get('/{id}', [ProductController::class, 'item']);
    Route::post('/{id}', [ProductController::class, 'update_item']);
});

Route::get('/', function () {
    return view('layout');
});
