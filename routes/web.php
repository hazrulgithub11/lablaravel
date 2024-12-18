<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add the student routes here
    Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [App\Http\Controllers\StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [App\Http\Controllers\StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [App\Http\Controllers\StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('students.destroy');
    Route::resource('timetables', App\Http\Controllers\TimetableController::class);

     // Timetable routes
     Route::resource('timetables', App\Http\Controllers\TimetableController::class);

     // Subject routes
     Route::resource('subjects', App\Http\Controllers\SubjectController::class);
 
     // Hall routes
     Route::resource('halls', App\Http\Controllers\HallController::class);
 
     // Day routes
     Route::resource('days', App\Http\Controllers\DayController::class);

     Route::resource('groups', App\Http\Controllers\GroupController::class);
});
  
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
