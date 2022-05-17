<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('main.index');

    // Users
    Route::get('/users', [UserController::class, 'index'])
        ->middleware('can:users.index')
        ->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])
        ->middleware('can:users.show')
        ->name('users.show');
    Route::patch('/users/{id}', [UserController::class, 'update'])
        ->middleware('can:users.update')
        ->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->middleware('can:users.destroy')
        ->name('users.destroy');
    Route::post('/users', [UserController::class, 'search'])
        ->middleware('can:users.search')
        ->name('users.search');

    // Roles
    Route::get('/roles', [RoleController::class, 'index'])
        ->middleware('can:roles.index')
        ->name('roles.index');

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('can:users.create')
        ->name('register');
});
