<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.home');
})->name('admin.home');