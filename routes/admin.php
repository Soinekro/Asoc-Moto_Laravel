<?php

use App\Http\Controllers\Admin\EvaluacionPostulanteController;
use App\Http\Controllers\Admin\EventoSocioController;
use App\Http\Controllers\Admin\JustificacionController;
use App\Http\Controllers\Admin\PagoController;
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

Route::prefix('/evaluaciones')->group(function () {
    Route::get('/', [EvaluacionPostulanteController::class,'index'])->name('admin.evaluaciones.index');
    Route::get('create', [EvaluacionPostulanteController::class,'create'])->name('admin.evaluaciones.create');
    Route::post('store', [EvaluacionPostulanteController::class,'store'])->name('admin.evaluaciones.store');
    Route::get('{id}/edit', [EvaluacionPostulanteController::class,'edit'])->name('admin.evaluaciones.edit');
    Route::post('{id}/update', [EvaluacionPostulanteController::class,'update'])->name('admin.evaluaciones.update');
    Route::delete('{id}/destroy', [EvaluacionPostulanteController::class,'destroy'])->name('admin.evaluaciones.destroy');
});

Route::prefix('/eventos')->group(function () {
    Route::get('/', [EventoSocioController::class,'index'])->name('admin.eventos.index');
    Route::get('create', [EventoSocioController::class,'create'])->name('admin.eventos.create');
    Route::post('store', [EventoSocioController::class,'store'])->name('admin.eventos.store');
});

Route::prefix('/justificaciones')->group(function () {
    Route::get('/', [JustificacionController::class,'index'])->name('admin.justificaciones.index');
    Route::get('create', [JustificacionController::class,'create'])->name('admin.justificaciones.create');
    Route::post('store', [JustificacionController::class,'store'])->name('admin.justificaciones.store');
    Route::get('{justificacion}/edit', [JustificacionController::class,'edit'])->name('admin.justificaciones.edit');
    Route::post('{justificacion}/update', [JustificacionController::class,'update'])->name('admin.justificaciones.update');
    Route::delete('{justificacion}', [JustificacionController::class,'destroy'])->name('admin.justificaciones.destroy');
});
Route::prefix('/pagos')->group(function () {
    Route::get('/', [PagoController::class,'index'])->name('admin.pagos.index');
    Route::delete('{justificacion}', [PagoController::class,'destroy'])->name('admin.pagos.destroy');
    /*
    Route::get('create', [JustificacionController::class,'create'])->name('admin.justificaciones.create');
    Route::post('store', [JustificacionController::class,'store'])->name('admin.justificaciones.store');
    Route::get('{justificacion}/edit', [JustificacionController::class,'edit'])->name('admin.justificaciones.edit');
    Route::post('{justificacion}/update', [JustificacionController::class,'update'])->name('admin.justificaciones.update');
    Route::delete('{justificacion}', [JustificacionController::class,'destroy'])->name('admin.justificaciones.destroy'); */
});
