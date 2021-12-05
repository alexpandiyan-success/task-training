<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[BlogController::class,'getAllNews'])->name('welcome')->middleware(['auth:sanctum', 'verified']);


Route::get('/dashboard',[BlogController::class,'index'])->name('dashboard')->middleware(['auth:sanctum', 'verified']);

Route::get('/news',[BlogController::class,'getAllNews'])->name('inde')->middleware(['auth:sanctum', 'verified']);

Route::get('/news/{id}',[BlogController::class,'getById'])->name('news-details')->middleware(['auth:sanctum', 'verified']);

Route::post('/addnews',[BlogController::class,'storeNews'])->name('store')->middleware(['auth:sanctum', 'verified']);