<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\TaskController;


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

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
// });

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:' . User::ROLE_USER])->group(function () {
    Route::get('/user', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    Route::get('/user', [UserDashboardController::class, 'userTasks'])->name('user.dashboard');
});


Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('admin.tasks.index');
    })->name('admin.dashboard');

    Route::get('/admin/tasks', [TaskController::class, 'index'])->name('admin.tasks.index');
    Route::get('/admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
    Route::post('/admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');

});

Route::get('/dashboard', [RoleController::class, 'checkRoleRedirect']);


