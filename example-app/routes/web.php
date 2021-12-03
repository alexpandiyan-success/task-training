<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[TaskController::class,'index'])->name('dashboard')->middleware(['auth:sanctum', 'verified']);
Route::get('/getall',[TaskController::class,'view'])->name('view')->middleware(['auth:sanctum', 'verified']);
Route::post('/getstore',[TaskController::class,'store'])->name('store')->middleware(['auth:sanctum', 'verified']);


