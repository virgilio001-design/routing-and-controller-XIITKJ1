<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::name('students.')->prefix('students')->group(function () {

    Route::get('/', [StudentController::class, 'index'])->name('index');

    Route::get('/create', [StudentController::class, 'create'])->name('create');

    Route::post('/', [StudentController::class, 'store'])->name('store');

    Route::get('/{student}', [StudentController::class, 'show'])->name('show');

    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');

    Route::put('/{student}', [StudentController::class, 'update'])->name('update');

    Route::delete('/{student}/destroy', [StudentController::class, 'destroy'])->name('destroy');
});

Route::name('teachers.')->prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show')->whereNumber('id');

    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    Route::post('/store', [TeacherController::class, 'store'])->name('store');

    Route::put('/{id}/update', [TeacherController::class, 'update'])->name('update');

    Route::delete('/{id}/destroy', [TeacherController::class, 'destroy'])->name('destroy');
});

Route::name('classes.')->prefix('classes')->group(function () {

    Route::get('/', IndexController::class)->name('index');

    Route::get('/{id}', ShowController::class)->name('show')->whereNumber('id');

    Route::get('/create', CreateController::class)->name('create');

    Route::get('/{id}/edit', EditController::class)->name('edit')->whereNumber('id');

    Route::post('/', StoreController::class)->name('store');

    Route::put('/{id}', UpdateController::class)->name('update')->whereNumber('id');

    Route::delete('/{id}', DestroyController::class)->name('destroy')->whereNumber('id');
});

// Manajemen Jurusan Siswa (Resource Controller)
Route::resource('majors', MajorsController::class);
