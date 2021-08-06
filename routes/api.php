<?php

use App\Http\Controllers\DivisionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/level', [App\Http\Controllers\LevelController::class, 'store'])->name('level.store');
Route::get('/level/{id}', [App\Http\Controllers\LevelController::class, 'show'])->name('level.show');
Route::put('/level/{id}', [App\Http\Controllers\LevelController::class, 'update'])->name('level.update');
Route::delete('/level/{id}', [App\Http\Controllers\LevelController::class, 'destroy'])->name('level.destroy');

Route::post('/branch', [App\Http\Controllers\BranchController::class, 'store'])->name('branch.store');
Route::get('/branch/{id}', [App\Http\Controllers\BranchController::class, 'show'])->name('branch.show');
Route::put('/branch/{id}', [App\Http\Controllers\BranchController::class, 'update'])->name('branch.update');
Route::delete('/branch{id}', [\App\Http\Controllers\BranchController::class, 'destroy'])->name('branch.destroy');

Route::post('/company', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('/company/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->name('company.show');
Route::put('/company/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::delete('/company/{id}', [\App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');

Route::post('/division', [App\Http\Controllers\DivisionController::class, 'store'])->name('division.store');
Route::get('/division/{id}', [App\Http\Controllers\DivisionController::class, 'show'])->name('division.show');
Route::put('/division/{id}', [App\Http\Controllers\DivisionController::class, 'update'])->name('division.update');
Route::delete('/division/{id}', [\App\Http\Controllers\DivisionController::class, 'destroy'])->name('division.destroy');

Route::post('/user', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::put('/user/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

Route::post('/fund_application', [\App\Http\Controllers\FundApplicationController::class, 'store'])->name('fund_application.store');
Route::get('/fund_application/{id}', [\App\Http\Controllers\FundApplicationController::class, 'show'])->name('fund_application.show');
Route::put('/fund_application/{id}', [\App\Http\Controllers\FundApplicationController::class, 'update'])->name('fund_application.update');
Route::delete('/fund_application/{id}', [\App\Http\Controllers\FundApplicationController::class, 'delete'])->name('fund_application.delete');
