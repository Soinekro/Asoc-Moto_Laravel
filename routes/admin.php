<?php

use App\Http\Controllers\Admin\PostulanteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SocioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehiculoController;
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

Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('users', UserController::class)->names('admin.users');

Route::prefix('/socios')->group(function () {
    Route::get('/', [SocioController::class,'index'])->name('admin.socios.index');
    Route::get('inactivos', [SocioController::class,'inactivos'])->name('admin.socios.inactivos');
    Route::get('{socio}/edit', [SocioController::class,'edit'])->name('admin.socios.edit');
    Route::post('{socio}/update', [SocioController::class,'update'])->name('admin.socios.update');
    Route::delete('{socio}',[SocioController::class,'destroy'])->name('admin.socios.destroy');
});

Route::prefix('/vehiculos')->group(function () {
    Route::get('/', [VehiculoController::class,'index'])->name('admin.vehiculos.index');
    Route::get('create', [VehiculoController::class,'create'])->name('admin.vehiculos.create');
    Route::post('store', [VehiculoController::class,'store'])->name('admin.vehiculos.store');
    Route::get('{vehiculo}/edit', [VehiculoController::class,'edit'])->name('admin.vehiculos.edit');
    Route::post('{vehiculo}/update', [VehiculoController::class,'update'])->name('admin.vehiculos.update');
    Route::delete('{vehiculo}',[VehiculoController::class,'destroy'])->name('admin.vehiculos.destroy');
});
