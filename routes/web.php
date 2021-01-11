<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ActionController;

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

Route::get('/', [MainController::class, 'index']);
Route::post('/', [MainController::class, 'index']);
Route::get('/prepare', [ActionController::class, 'jsonResponse']);
Route::post('/addNode', [ActionController::class, 'jsonAddNode']);
Route::post('/moveNode', [ActionController::class, 'jsonMoveNode']);
Route::post('/changeNode', [ActionController::class, 'jsonChangeNode']);
Route::post('/deleteNode', [ActionController::class, 'jsonDeleteNode']);
