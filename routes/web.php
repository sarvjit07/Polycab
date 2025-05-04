<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('dashboard'); // Define the dashboard route here

    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/user_manage', [UserController::class, 'index'])->name('admin.user_manage');
    Route::get('/admin/create_user', [UserController::class, 'create'])->name('admin.create_user');
    Route::post('/admin/store_user', [UserController::class, 'store'])->name('admin.store_user');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('user_manage');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('edit_user');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('update_user');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('delete_user');
    });

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

require __DIR__.'/auth.php';
