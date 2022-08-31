<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\TempController;
use App\Http\Controllers\OrderController;
use App\Models\Department;
use App\Models\Product;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ImageUploadController;
use Laravel\Socialite\Facades\Socialite;

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
Route::get('/', [HomeController::class, 'index'])->name('index');
//Register
Route::get('/register', [UserController::class, 'register'])->name('auth.register');
Route::post('/handleRegister', [UserController::class, 'handleRegister'])->name('auth.handleRegister');
//Login
Route::get('/login', [UserController::class, 'login'])->name('auth.login');
Route::post('/handleLogin', [UserController::class, 'handleLogin'])->name('auth.handleLogin');
//logout
Route::get('/logout',[UserController::class, 'logout'])->name('auth.logout');
//forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//edit profile
Route::get('/profile', [UserController::class, 'profile'])->name('auth.myprofile');
Route::get('/updateprofile', [UserController::class, 'updateprofile'])->name('auth.updateprofile');
Route::post('/profile/edit/{id}', [UserController::class, 'editprofile'])->name('auth.edit.profile');
//delete user
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('auth.delete');
//upload image
Route::post('image-upload', [ UserController::class, 'imageUploadPost' ])->name('image.upload.post');
//department products
Route::get('/show/{id}', [DepartmentController::class, 'index'])->name('departmentProducts');
//add to cart
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
//order Temp
Route::get('order-temp', [TempController::class, 'index'])->name('ordertemp');
Route::get('order-temp-plus/{id}', [TempController::class, 'plus'])->name('ordertemp-plus');
Route::get('order-temp-minus/{id}', [TempController::class, 'minus'])->name('ordertemp-minus');
Route::get('order-temp-delete/{id}', [TempController::class, 'delete'])->name('ordertemp-delete');
Route::get('order-temp-delete-all', [TempController::class, 'delete_all'])->name('ordertemp-delete-all');
//order confirm
Route::get('order-confirm', [OrderController::class, 'OrderConfirm'])->name('OrderConfirm');

Route::get('/auth/redirect', [UserController::class, 'redirectToGithub'])->name('github.redirect');
Route::get('/auth/callback', [UserController::class, 'Githubcallback'])->name('github.callback');

