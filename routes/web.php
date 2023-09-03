<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // return view('admin.dashboard');
    return view('login');
});
// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/auth', [AuthController::class, 'login'])->name('auth');

Route::group(["middleware" => "admin_auth"], function () {
    Route::get('/admin/dashboard', [AuthController::class, 'admin_dashboard'])->name('admin/dashboard');
    //manage categories
    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::get('/admin/category/add', [CategoryController::class, 'add']);
    Route::post('/admin/category/store', [CategoryController::class, 'store']);
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/admin/category/update', [CategoryController::class, 'update']);
    Route::get('/admin/category/status/{id}/{type}', [CategoryController::class, 'status']);
    //manage coupons
    Route::get('/admin/coupon', [CouponController::class, 'index']);
    Route::get('/admin/coupon/add', [CouponController::class, 'add']);
    Route::post('/admin/coupon/store', [CouponController::class, 'store']);
    Route::get('/admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('/admin/coupon/edit/{id}', [CouponController::class, 'edit']);
    Route::post('/admin/coupon/update', [CouponController::class, 'update']);
    Route::get('/admin/coupon/status/{id}/{type}', [CouponController::class, 'status']);
    //manage size
    Route::get('/admin/size', [SizeController::class, 'index']);
    Route::get('/admin/size/add', [SizeController::class, 'add']);
    Route::post('/admin/size/store', [SizeController::class, 'store']);
    Route::get('/admin/size/delete/{id}', [SizeController::class, 'delete']);
    Route::get('/admin/size/edit/{id}', [SizeController::class, 'edit']);
    Route::post('/admin/size/update', [SizeController::class, 'update']);
    Route::get('/admin/size/status/{id}/{type}', [SizeController::class, 'status']);
    //manage Color
    Route::get('/admin/color', [ColorController::class, 'index']);
    Route::get('/admin/color/add', [ColorController::class, 'add']);
    Route::post('/admin/color/store', [ColorController::class, 'store']);
    Route::get('/admin/color/delete/{id}', [ColorController::class, 'delete']);
    Route::get('/admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::post('/admin/color/update', [ColorController::class, 'update']);
    Route::get('/admin/color/status/{id}/{type}', [ColorController::class, 'status']);
    //manage Product
    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::get('/admin/product/add', [ProductController::class, 'add']);
    Route::post('/admin/product/store', [ProductController::class, 'store']);
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/admin/product/update', [ProductController::class, 'update']);
    Route::get('/admin/product/status/{id}/{type}', [ProductController::class, 'status']);
});
