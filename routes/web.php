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

Route::get('/login', [AuthController::class, 'loginView'])->name('login-view')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post')->middleware('guest');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::name('students.')->middleware(['auth', 'role:student,teacher'])->prefix('students')->controller(StudentController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::get('/{student}', 'show')->name('show')->whereNumber('student');

    Route::get('/{student}/edit', 'edit')->name('edit')->whereNumber('student');

    Route::post('/', 'store')->name('store');

    Route::put('/{student}', 'update')->name('update')->whereNumber('student');

    Route::delete('/{student}', 'destroy')->name('destroy')->whereNumber('student');

});

Route::name('teachers.')->middleware(['auth', 'role:teacher'])->prefix('teachers')->controller(TeacherController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/{id}', 'show')->name('show')->whereNumber('id');

    Route::get('/create', 'create')->name('create');

    Route::get('/{id}/edit', 'edit')->name('edit')->whereNumber('id');

    Route::post('/', 'store')->name('store');

    Route::put('/{id}', 'update')->name('update')->whereNumber('id');

    Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');

});

Route::name('classes.')->middleware(['auth', 'role:teacher'])->prefix('classes')->group(function () {

    Route::get('/', IndexController::class)->name('index');

    Route::get('/{id}', ShowController::class)->name('show')->whereNumber('id');

    Route::get('/create', CreateController::class)->name('create');

    Route::get('/{id}/edit', EditController::class)->name('edit')->whereNumber('id');

    Route::post('/', StoreController::class)->name('store');

    Route::put('/{id}', UpdateController::class)->name('update')->whereNumber('id');

    Route::delete('/{id}', DestroyController::class)->name('destroy')->whereNumber('id');
});

// Management Major (Resource Controller)

Route::resource('majors', MajorsController::class)->middleware(['auth', 'role:teacher']);
