<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

Route::resource('estudiantes', EstudianteController::class);
