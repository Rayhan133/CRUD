<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::prefix('user/')
    ->middleware('role:user')
    ->name('user.')
    ->group(function () {
        Route::get('file-upload-index', [UserController::class, 'fileUploadIndex'])
            ->name('fileUploadIndex');
        Route::post('file-upload', [UserController::class, 'fileUpload'])
            ->name('file.upload');
        Route::get('file-and-group-info', [UserController::class, 'fileAndGroupInfo'])
            ->name('fileAndGroupInfo');
        Route::get('fileGroupInfo/{id}', [UserController::class, 'fileGroupInfo'])
            ->name('fileGroupInfo');
        Route::get('api/fileHasGroupInfo/{id}', [UserController::class, 'fileHasGroupInfo'])
            ->name('fileHasGroupInfo');
    });


Route::prefix('user/')
    ->middleware('role:admin')
    ->name('user.')
    ->group(function () {
        Route::get('status/{id}', [UserController::class, 'accountStatus'])
            ->name('accountStatus');
        Route::get('{id}/edit', [UserController::class, 'edit'])
            ->name('edit');
        Route::put('{user}/update', [UserController::class, 'update'])
            ->name('update');
        Route::delete('{user}/delete', [UserController::class, 'destroy'])
            ->name('destroy');
    });
