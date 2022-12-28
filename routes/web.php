<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/student', [StudentController::class, 'index'])->name('student.index');
// Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
// Route::post('/student', [StudentController::class, 'store'])->name('student.store');
// Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
// Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
// Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::resource('student', StudentController::class)->middleware('auth');

// Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
// Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
// Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
// Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
// Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
// Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
Route::resource('teacher', TeacherController::class)->middleware('auth');

Route::get('/default', function () {
    return view('default');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
