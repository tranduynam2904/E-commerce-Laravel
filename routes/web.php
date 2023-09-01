<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('employee-list.create', [EmployeeController::class, 'create'])->name('employee-list.create');
    Route::post('employee-list.store', [EmployeeController::class, 'store'])->name('employee-list.store');
});
Route::get('admin', function () {
    return view('admin.layout.master');
});
require __DIR__ . '/auth.php';
