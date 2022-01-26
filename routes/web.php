<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\CategoryController;

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
Route::get('/category', [CategoryController::class, 'show']);
Route::get('/category/tree', [CategoryController::class, 'show_tree']);
Route::post('/category', [CategoryController::class, 'import']);

Route::get('/', function () {
    return view('layout');
});
