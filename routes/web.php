<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;


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
        return redirect()->route('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/tasks', [TaskController::class, 'index'])->name('admin.tasks.index');
    Route::get('/admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
    Route::post('/admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');

    Route::get('/admin/users/edit/{user}', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/admin/users/destroy/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::put('/admin/users/update/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/assign-task/{user}', [AdminController  ::class, 'assignTask'])->name('admin.users.assignTask');

});

Route::get('/dashboard', [RoleController::class, 'checkRoleRedirect']);


