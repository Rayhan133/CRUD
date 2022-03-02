<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('user.login');
});
Auth::routes();

Route::prefix('auth')->group(function () {
    Route::get('user/register', [RegisterController::class, 'userRegisterView'])->name('user.register');
    Route::post('user/register/store', [RegisterController::class, 'store'])->name('user.register.store');
    Route::get('user/login', [LoginController::class, 'userLoginView'])->name('user.login');
    Route::post('user/login', [LoginController::class, 'userLoginProcess'])->name('user.LoginProcess');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('user.dashboard');

Route::get('/logout', [LoginController::class, 'userLogout'])
    ->name('user.logout')->middleware('auth');

require_once('_partial/admin.php');
require_once('_partial/user.php');
