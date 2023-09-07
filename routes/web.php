<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\Employee\WidgetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('widget', [WidgetController::class, 'index'])->name('widget');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('employee-list', [EmployeeController::class, 'index'])->name('employee-list');
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('employee-list/create', [EmployeeController::class, 'create'])->name('employee-list.create');
    Route::post('employee-list/store', [EmployeeController::class, 'store'])->name('employee-list.store');
    Route::get('employee-list/detail/{id}', [EmployeeController::class, 'detail'])->name('employee-list.detail');
    Route::post('employee-list/update/{id}', [EmployeeController::class, 'update'])->name('employee-list.update');
    Route::get('employee-list/delete/{id}', [EmployeeController::class, 'delete'])->name('employee-list.delete');
    Route::post('employee-list/search', [EmployeeController::class, 'searchEmployee'])->name('employee-list.search');
});
Route::get('admin', function () {
    return view('admin.layout.master');
});
Route::prefix('FTM')->name('FTM.')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login/account', [LoginController::class, 'login'])->name('login.account');
});

require __DIR__ . '/auth.php';
