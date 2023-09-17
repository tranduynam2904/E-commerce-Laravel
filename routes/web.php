<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\AdminJobController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\AttendanceScheduleController;
use App\Http\Controllers\employee\EmployeeController;
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

Route::prefix('FTM')->name('FTM.')->group(function () {
    Route::get('employee/dashboard', [DashboardController::class, 'index'])->name('employee.dashboard');
    Route::get('employee/profile', [EmployeeController::class, 'detail'])->name('employee.detail');
    Route::get('widget', [WidgetController::class, 'index'])->name('widget');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('employee-list', [AdminEmployeeController::class, 'index'])->name('employee-list.index');
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('employee-list/create', [AdminEmployeeController::class, 'create'])->name('employee-list.create');
    Route::post('employee-list/store', [AdminEmployeeController::class, 'store'])->name('employee-list.store');
    Route::get('employee-list/detail/{id}', [AdminEmployeeController::class, 'show'])->name('employee-list.show');
    Route::put('employee-list/update/{id}', [AdminEmployeeController::class, 'update'])->name('employee-list.update');
    Route::get('employee-list/delete/{id}', [AdminEmployeeController::class, 'destroy'])->name('employee-list.destroy');
    Route::get('attendance-schedule', [AttendanceScheduleController::class, 'index'])->name('attendance-schedule');
    Route::post('employee-list/slug', [AdminEmployeeController::class, 'createSlug'])->name('employee-list.create.slug');
    Route::post('employee-list/ckeditor-upload-image', [AdminEmployeeController::class,'uploadImage'])->name('employee-list.ckeditor.upload.image');
    Route::resource('job-categories', AdminJobController::class);

});

Route::get('admin', function () {
    return view('admin.layout.master');
});
Route::prefix('FTM')->name('FTM.')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login/account', [LoginController::class, 'login'])->name('login.account');
});

require __DIR__ . '/auth.php';
