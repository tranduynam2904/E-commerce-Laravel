<?php

use App\Http\Controllers\admin\AdminJobController;
use App\Http\Controllers\admin\EmployeeDetailProfileController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\client\OtpController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\admin\AttendanceScheduleController;
use App\Http\Controllers\admin\ClientAccountController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmployeeAccountController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\Client\SendOtpSmsController;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\Employee\WidgetController;
use App\Http\Controllers\Login\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Mail\MailToAdmin;
use Illuminate\Support\Facades\Mail;
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

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('user/account/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('user/account/profile/updateProfile', [ProfileController::class, 'updateProfile'])->name('profile.edit.update-profile');
    Route::get('user/account/profile/verify', [ProfileController::class, 'verifyOption'])->name('profile.verify');
    Route::get('user/account/profile/verify-password', [ProfileController::class, 'verifyPassword'])->name('profile.verify-password');
    Route::get('user/account/profile/new-password', [ProfileController::class, 'newPassword'])->name('profile.new-password');
    Route::post('user/account/profile/new-password/store', [ProfileController::class, 'newPasswordStore'])->name('profile.new-password.store');
    Route::post('user/account/profile/verify-password/store', [ProfileController::class, 'verifyPasswordStore'])->name('profile.verify-password.store');
    Route::get('user/account/profile/phone-update', [ProfileController::class, 'phoneUpdateIndex'])->name('profile.phone.index');
    Route::patch('user/account/profile/phone-update/update', [ProfileController::class, 'updatePhone'])->name('profile.phone.update-phone');
    Route::get('user/account/profile/phone-update/otp', [ProfileController::class, 'verifyOtp'])->name('profile.phone.verifyOtp');
    Route::post('user/account/profile/phone-update/otp', [ProfileController::class, 'verifyOtp'])->name('profile.phone.verifyOtp.store');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('product/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('product.add-to-cart');
    Route::get('product/delete-item-in-cart/{productId}', [CartController::class, 'deleteItem'])->name('product.delete-item-in-cart');
    Route::get('product/update-item-in-cart/{productId}/{qty?}', [CartController::class, 'updateItem'])->name('product.update-item-in-cart');
    Route::get('product/delete-all-in-cart', [CartController::class, 'emptyCart'])->name('product.delete-all-in-cart');
    Route::post('product/add-to-cart/notification');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('place-order', [OrderController::class, 'placeOrder'])->name('place-order');
    Route::get('vnpay-callback', [OrderController::class, 'vnpayCallback'])->name('vnpay-callback');
    //     Route::get('mail', function () {
    //         Mail::to('tranduynam2904@gmail.com')->send(new MailToAdmin());
    //         return view('mail.mail-to-admin');
    //     });
});

// Route::prefix('FTM')->middleware('auth', 'role:employee')->name('FTM.')->group(function () {
//     Route::get('employee/dashboard', [DashboardController::class, 'index'])->name('employee.dashboard');
//     Route::get('employee/profile', [EmployeeController::class, 'detail'])->name('employee.detail');
//     Route::get('widget', [WidgetController::class, 'index'])->name('widget');
// });

Route::prefix('')->name('admin.')->group(function () {
        Route::middleware(['auth', 'role:admin|employee'])->group(function () {
            Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::get('client-account', [ClientAccountController::class, 'index'])->name('client-account.index');
            // Route::get('profile', [EmployeeDetailProfileController::class, 'show'])->name('profile');

            // Route::put('profile/{id}', [EmployeeDetailProfileController::class, 'update'])->name('profile.update');
        });
        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::get('client-account/create', [ClientAccountController::class, 'create'])->name('client-account.create');
            Route::post('client-account', [ClientAccountController::class, 'store'])->name('client-account.store');
            Route::get('client-account/{client_account}', [ClientAccountController::class, 'show'])->name('client-account.show');
            Route::get('client-account/{client_account}/edit', [ClientAccountController::class, 'edit'])->name('client-account.edit');
            Route::put('client-account/{client_account}', [ClientAccountController::class, 'update'])->name('client-account.update');
            Route::delete('client-account/{client_account}', [ClientAccountController::class, 'destroy'])->name('client-account.destroy');
            Route::get('employee-list', [AdminEmployeeController::class, 'index'])->name('employee-list.index');
            Route::get('employee-list/create', [AdminEmployeeController::class, 'create'])->name('employee-list.create');
            Route::post('employee-list/store', [AdminEmployeeController::class, 'store'])->name('employee-list.store');
            Route::get('employee-list/detail/{employee_list}', [AdminEmployeeController::class, 'show'])->name('employee-list.show');
            Route::put('employee-list/update/{employee_list}', [AdminEmployeeController::class, 'update'])->name('employee-list.update');
            Route::get('employee-list/delete/{employee_list}', [AdminEmployeeController::class, 'destroy'])->name('employee-list.destroy');
            Route::post('employee-list/slug', [AdminEmployeeController::class, 'createSlug'])->name('employee-list.create.slug');
            Route::post('employee-list/ckeditor-upload-image', [AdminEmployeeController::class, 'uploadImage'])->name('employee-list.ckeditor.upload.image');
            Route::resource('job-category', AdminJobController::class);
            Route::resource('product-category', ProductCategoryController::class);
            Route::resource('product', ProductController::class);
            Route::post('product/slug', [ProductController::class, 'createSlug'])->name('product.create.slug');
            Route::post('product/ckeditor-upload-image', [ProductController::class, 'uploadImage'])->name('product.ckeditor.upload.image');
            Route::resource('employee-account', EmployeeAccountController::class);
            Route::resource('permission', PermissionController::class);
            Route::post('role/{role}/permission', [RoleController::class, 'givePermission'])->name('role.permission.give');
            Route::delete('role/{role}/revoke/{permission}', [RoleController::class, 'revokePermission'])->name('role.permission.revoke');
            Route::post('permission/{permission}/role', [PermissionController::class, 'assignRole'])->name('permission.role.assign');
            Route::delete('permission/{permission}/remove/{role}', [PermissionController::class, 'removeRole'])->name('permission.role.remove');
            Route::resource('role', RoleController::class);
        });
        Route::middleware(['auth', 'role:employee'])->group(function () {
            Route::get('attendance-schedule', [AttendanceScheduleController::class, 'index'])->name('attendance-schedule');
        });
    });

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::get('register/otp/phone-verification', [OtpController::class, 'index'])->name('otp.verification');
// Route::post('register/otp/phone-store', [OtpController::class, 'store'])->name('otp.store');
// Route::get('register/otp/phone-sms', [SendOtpSmsController::class, 'sendOtp']);

require __DIR__ . '/auth.php';
