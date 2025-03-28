<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DefinicionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductBacklogController;
use App\Http\Controllers\HistoriausuarioController;
use App\Http\Controllers\SprintbacklogController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/users', UserController::class)->names('users');
Route::resource('/definiciones', DefinicionController::class)->names('definiciones');
Route::resource('/roles', RoleController::class)->names('roles');
Route::resource('/productbacklog', ProductBacklogController::class)->names('productbackloges');
Route::resource('/historiausuario', HistoriausuarioController::class)->names('historiausuarios');
Route::resource('/sprintbacklog', SprintbacklogController::class)->names('sprintbackloges');


//Para actualizar solo el estado
Route::patch('/sprintbacklog/{id}/updateEstado/{tareaId}', [SprintbacklogController::class, 'updateEstado'])
    ->name('sprintbackloges.updateEstado');


require __DIR__.'/auth.php';
