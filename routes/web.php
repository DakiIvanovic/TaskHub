<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;

Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth', 'role:' . User::ROLE_USER])->group(function () {
    Route::get('/user', [UserDashboardController::class, 'userTasks'])->name('user.dashboard');
    Route::get('/dashboard', [UserDashboardController::class, 'userTasks']);
    Route::get('/user/inbox', [UserDashboardController::class, 'userInbox'])->name('user.inbox');
    Route::post('/user/messages/reply', [UserDashboardController::class, 'replyStore'])->name('user.replyStore');
    Route::get('/user/inbox', [UserDashboardController::class, 'searchChatByNameOrEmail'])->name('user.inbox');
});

Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])->group(function () {
    Route::get('/admin', fn () => redirect()->route('admin.dashboard'))->name('admin.dashboard');
    Route::get('/admin/tasks', [TaskController::class, 'retrieveTasks'])->name('admin.tasks.index');
    Route::get('/admin/tasks/create', [TaskController::class, 'retrieveUsers'])->name('admin.tasks.create');
    Route::post('/admin/tasks', [TaskController::class, 'saveTask'])->name('admin.tasks.store');
    Route::get('/admin/users/edit/{user}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::delete('/admin/users/destroy/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');
    Route::put('/admin/users/update/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/admin/dashboard', [AdminController::class, 'searchUserByNameOrEmail'])->name('admin.dashboard');
});

Route::get('/dashboard', [RoleController::class, 'checkRoleRedirect']);
