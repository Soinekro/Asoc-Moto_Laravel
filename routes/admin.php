<?php

use App\Http\Controllers\Admin\PostulanteController;
use App\Http\Controllers\Admin\SocioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.home');
})->name('admin.home');

Route::prefix('/postulantes')->group(function () {
    Route::get('/', [PostulanteController::class,'index'])->name('admin.postulantes.index');
    Route::get('create', [PostulanteController::class,'create'])->name('admin.postulantes.create');
    Route::post('store', [PostulanteController::class,'store'])->name('admin.postulantes.store');
    Route::get('{postulante}/edit', [PostulanteController::class,'edit'])->name('admin.postulantes.edit');
    Route::post('{postulante}/update', [PostulanteController::class,'update'])->name('admin.postulantes.update');
    Route::delete('{postulante}',[PostulanteController::class,'destroy'])->name('admin.postulantes.destroy');
});
Route::prefix('/socios')->group(function () {
    Route::get('/', [SocioController::class,'index'])->name('admin.socios.index');
    Route::get('{socio}/edit', [SocioController::class,'edit'])->name('admin.socios.edit');
    Route::post('{socio}/update', [SocioController::class,'update'])->name('admin.socios.update');
    Route::delete('{socio}',[SocioController::class,'destroy'])->name('admin.socios.destroy');
});
