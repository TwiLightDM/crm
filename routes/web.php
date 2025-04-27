<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/departmentsManager', function () {
    return view('departments');
})->middleware(['auth', 'verified', 'can:отделы (чтение)'])->name('departments');

Route::get('/rolesManager', function () {
    return view('roles');
})->middleware(['auth', 'verified', 'can:роли (чтение)'])->name('roles');

Route::get('/leadsManager', function () {
    return view('leads');
})->middleware(['auth', 'verified', 'can:лиды (чтение)'])->name('leads');

Route::get('/usersManager', function () {
    return view('users');
})->middleware(['auth', 'verified', 'can:сотрудники (чтение)'])->name('users');


Route::get('/meetingsManager', function () {
    return view('meetings');
})->middleware(['auth', 'verified', 'can:встречи (чтение)'])->name('meetings');

Route::get('/projectsManager', function () {
    return view('projects');
})->middleware(['auth', 'verified', 'can:проекты (чтение)'])->name('projects');

Route::get('/tasksManager', function () {
    return view('tasks');
})->middleware(['auth', 'verified', 'can:задачи (чтение)'])->name('tasks');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
