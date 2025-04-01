<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Studentų sąrašas prieinamas visiems
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Grupė, prieinama tik prisijungusiems vartotojams
Route::middleware(['auth'])->group(function () {
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/trashed', [StudentController::class, 'trashed'])->name('students.trashed');
    Route::post('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::delete('/students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.forceDelete');

});

// Laravel Breeze autentifikacijos maršrutai (login/register)
require __DIR__.'/auth.php';
