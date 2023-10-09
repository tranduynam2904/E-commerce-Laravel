<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\AdminJobController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\client\OtpController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\admin\AttendanceScheduleController;
use App\Http\Controllers\Admin\EmployeeAccountController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\SendOtpSmsController;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\Employee\WidgetController;
use App\Http\Controllers\Login\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
<<<<<<< HEAD

Route::get('productCategory', [HomeController::class, 'showProductCategory'])->name('home.productCategory');
Route::get('productCategory/{productCategory}', [HomeController::class, 'showProduct'])->name('home.product-category');
=======


>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('user/account/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('FTM')->middleware('auth', 'role:employee')->name('FTM.')->group(function () {
    Route::get('employee/dashboard', [DashboardController::class, 'index'])->name('employee.dashboard');
    Route::get('employee/profile', [EmployeeController::class, 'detail'])->name('employee.detail');
    Route::get('widget', [WidgetController::class, 'index'])->name('widget');
});

Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin.')->group(function () {
    Route::get('employee-list', [AdminEmployeeController::class, 'index'])->name('employee-list.index');
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('employee-list/create', [AdminEmployeeController::class, 'create'])->name('employee-list.create');
    Route::post('employee-list/store', [AdminEmployeeController::class, 'store'])->name('employee-list.store');
    Route::get('employee-list/detail/{employee_list}', [AdminEmployeeController::class, 'show'])->name('employee-list.show');
    Route::put('employee-list/update/{employee_list}', [AdminEmployeeController::class, 'update'])->name('employee-list.update');
    Route::get('employee-list/delete/{employee_list}', [AdminEmployeeController::class, 'destroy'])->name('employee-list.destroy');
    Route::get('attendance-schedule', [AttendanceScheduleController::class, 'index'])->name('attendance-schedule');
    Route::post('employee-list/slug', [AdminEmployeeController::class, 'createSlug'])->name('employee-list.create.slug');
    Route::post('employee-list/ckeditor-upload-image', [AdminEmployeeController::class, 'uploadImage'])->name('employee-list.ckeditor.upload.image');
    Route::resource('job-category', AdminJobController::class);
    Route::resource('product-category', ProductCategoryController::class);
    Route::resource('product', ProductController::class);
    Route::post('product/slug', [ProductController::class, 'createSlug'])->name('product.create.slug');
    Route::post('product/ckeditor-upload-image', [ProductController::class, 'uploadImage'])->name('product.ckeditor.upload.image');
<<<<<<< HEAD
    Route::resource('employee-account', EmployeeAccountController::class);
=======
Route::resource('employee-account',EmployeeAccountController::class);
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
});

Route::get('admin', function () {
    return view('admin.layout.master');
});
Route::prefix('FTM')->name('FTM.')->group(function () {
    // Route::get('login', [LoginController::class, 'index'])->name('login');
    // Route::post('login/account', [LoginController::class, 'login'])->name('login.account');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
<<<<<<< HEAD
Route::get('otp/verification', [OtpController::class, 'index'])->name('otp.verification');
Route::post('otp/store', [OtpController::class, 'store'])->name('otp.store');
Route::get('otp/sms', [SendOtpSmsController::class, 'sendOtp']);

=======
Route::get('otp/verification' ,[OtpController::class,'index'])->name('otp.verification');
Route::post('otp/store',[OtpController::class,'store'])->name('otp.store');
// Route::get('user/verification', function(){
//     return view('auth.verify-email');
// })->name('auth.verify-email');
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
require __DIR__ . '/auth.php';

