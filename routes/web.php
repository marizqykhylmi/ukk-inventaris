<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Operator\ItemController as OperatorItemController;
use App\Http\Controllers\Operator\LendingController as OperatorLendingController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        // 🔥 FIXED: dashboard pakai controller (WAJIB)
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])
            ->name('admin.profile.photo');

        Route::get('/profile', function () {
            return view('admin.profile');
        })->name('admin.profile');

        Route::resource('categories', CategoryController::class);
        Route::resource('items', ItemController::class);
        Route::resource('users', UserController::class);
    });

/*
|--------------------------------------------------------------------------
| OPERATOR
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:operator'])
    ->prefix('operator')
    ->name('operator.')
    ->group(function () {

        // dashboard operator
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // items
        Route::get('/items', [OperatorItemController::class, 'index'])
            ->name('items.index');

        // lending resource
        Route::resource('lending', OperatorLendingController::class);

        // return
        Route::get('/lending/{id}/return', [OperatorLendingController::class, 'returnForm'])
            ->name('lending.return.form');

        Route::put('/lending/{id}/return', [OperatorLendingController::class, 'processReturn'])
            ->name('lending.return.process');

        // profile
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::post('/profile/update-password', [ProfileController::class, 'updatePassword']);
    });