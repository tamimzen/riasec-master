<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SoalController;

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


// todo : Session CRUD Soal & Pernyataan
Route::post('soal', [SoalController::class, 'save'])->name('soal.store'); # tambah data baru soal dan pernyataan
Route::put('soal/{id}', [SoalController::class, 'update'])->name('soal.update'); # update data soal dan pernyataan
Route::delete('soal/{id}', [SoalController::class,'destroy'])->name('soal.destroy'); # delete data soal dan pernyataan