<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::prefix('admin/')
    ->middleware('role_or_permission:admin')
    ->name('admin.user.')
    ->group(function () {
        Route::get('user/list-view', [AdminController::class, 'userListView'])
            ->name('listView');
    });
