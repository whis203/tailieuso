<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ManageDocument;
use App\Http\Controllers\ManageCommentController;
use App\Http\Controllers\ManageEducationController;
use App\Http\Controllers\ManageAccountController;
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

// trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
// đăng ký
Route::get('/signup', [SignupController::class, 'index'])->name('signup.index');
Route::post('/signup', [SignupController::class, 'create'])->name('signup.create');
// đăng nhập
Route::get('/signin', [SigninController::class, 'index'])->name('signin.index');
Route::post('/signin', [SigninController::class, 'login'])->name('signin.login');
// đăng xuất
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
// thông tin người dùng
Route::get('/info', [InfoController::class, 'index'])->name('info.index');
Route::post('/info/updateInfo', [InfoController::class, 'updateInfo'])->name('info.updateInfo');
Route::post('/info/changepassword', [InfoController::class, 'changePassword'])->name('changePassword');
Route::post('/info/createProduct', [ProductsController::class, 'create'])->name('product.create');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
// tài liệu
Route::get('/document', [DocumentController::class, 'index'])->name('document.index');
Route::get('/document/search', [DocumentController::class, 'search'])->name('document.search');
// sản phảm
Route::get('/product/{id}', [ProductsController::class, 'showProduct'])->name('product.detail');
Route::get('/fileupload/{id}', [ProductsController::class, 'fileupload'])->name('product.upload');
Route::get('/product/delete/{id}', [ProductsController::class, 'deleteProductId'])->name('productId.delete');
Route::get('/product/edit/{id}', [ProductsController::class, 'editProductId'])->name('productId.edit');
Route::put('/product/update/{id}', [ProductsController::class, 'updateProductId'])->name('productId.update');
Route::post('/product/reply', [ProductsController::class, 'storeReply'])->name('comment.reply.store');
// yêu thích

Route::get('/favorite', [FavoriteController::class, 'viewFavorites'])->name('favorite.index');
Route::get('/addFavorite/{id}', [ProductsController::class, 'addFavorite'])->name('product.addFavorite');
Route::get('/favorite/{id}', [ProductsController::class, 'removeFavorite'])->name('product.deleteFavorite');
Route::get('/education/{id}', [HomeController::class, 'select'])->name('education.select');
Route::get('/education', [KhoaController::class, 'index'])->name('education.index');
Route::get('/education/{id}', [KhoaController::class, 'select'])->name('education.select');
Route::get('/education/detail/{id}', [EducationController::class, 'eduDetail'])->name('education.eduDetail');
// bình luận
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/products/{product}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('comments/{id}/edit', [ProductsController::class, 'edit'])->name('comments.edit');
Route::put('comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
// reply
Route::get('commentsReply/{id}/edit', [ProductsController::class, 'editReply'])->name('commentsReply.edit');
Route::put('commentsReply/{id}', [ProductsController::class, 'updateReply'])->name('commentsReply.update');
Route::get('commentsReply/{id}', [ProductsController::class, 'destroyReply'])->name('commentsReply.destroy');
Route::post('/product/reply', [ProductsController::class, 'storeReply'])->name('comment.reply.store');

// admin

Route::get('/admin', [ManageController::class, 'index'])->name('admin.index');


Route::get('/admin/document', [ManageDocument::class, 'index'])->name('managedocument.index');
Route::get('/admin/document/add', [ManageDocument::class, 'showFormAdd'])->name('managedocument.showFormAdd');
Route::get('/admin/document/edit/{id}', [ManageDocument::class, 'showFormEdit'])->name('managedocument.showFormEdit');


Route::get('/admin/account', [ManageAccountController::class, 'index'])->name('manageaccount.index');
Route::get('/admin/account/add', [ManageAccountController::class, 'showFormAdd'])->name('manageaccount.showFormAdd');
Route::post('/admin/account/create', [ManageAccountController::class, 'create'])->name('manageaccount.create');
Route::get('/admin/account/delete/{id}', [ManageAccountController::class, 'deleteUserId'])->name('manageaccount.delete');
Route::get('/admin/account/edit/{id}', [ManageAccountController::class, 'showFormEdit'])->name('manageaccount.showFormEdit');
Route::post('/admin/account/update/{id}', [ManageAccountController::class, 'updateInfo'])->name('manageaccount.updateInfo');

Route::get('/admin/education', [ManageEducationController::class, 'index'])->name('manageeducation.index');
Route::get('/admin/education/add', [ManageEducationController::class, 'showFormAdd'])->name('manageeducation.showFormAdd');
Route::post('/admin/education/create', [ManageEducationController::class, 'addEducation'])->name('manageeducation.addEducation');
Route::get('/admin/education/edit/{id}', [ManageEducationController::class, 'showFormEdit'])->name('manageeducation.showFormEdit');
Route::post('/admin/education/update/{id}', [ManageEducationController::class, 'updateEdu'])->name('manageeducation.updateEdu');
Route::get('/admin/education/delete/{id}', [ManageEducationController::class, 'deleteEduId'])->name('manageeducation.delete');

Route::get('/admin/comment', [ManageCommentController::class, 'index'])->name('managecomment.index');
Route::get('/admin/comment/recent', [ManageCommentController::class, 'recent'])->name('managecomment.recent');
Route::get('/admin/comment/delete/{id}', [ManageCommentController::class, 'deleteCommentId'])->name('managecomment.delete');
