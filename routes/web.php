<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\borrowingController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\discoveryController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\Auth\MemberRegisterController;
use App\Http\Controllers\Auth\MemberLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\discoveryMemberController;
use App\Http\Middleware\AuthMember;
use App\Http\Middleware\AuthUser;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register/member', [MemberRegisterController::class, 'showRegisterForm'])->name('register.member');
Route::post('/register/member', [MemberRegisterController::class, 'register']);

// Rute Login User
Route::get('/login/user', [UserLoginController::class, 'showLoginForm'])->name('login.user');
Route::post('/login/user', [UserLoginController::class, 'login']);
Route::post('/logout/user', [UserLoginController::class, 'logout'])->name('logout.user');

Route::get('/login/member', [MemberLoginController::class, 'showLoginForm'])->name('login.member');
Route::post('/login/member', [MemberLoginController::class, 'login']);
Route::post('/logout/member', [MemberLoginController::class, 'logout'])->name('logout.member');

Route::middleware([AuthMember::class])->group(function () {
    // Halaman Discovery untuk Member
    Route::get('/discoveryMember', [discoveryMemberController::class, 'index'])->name('discoveryMember.index');
    Route::resource('/discoveryMember', discoveryMemberController::class);
});

// Rute dashboard user
Route::middleware([AuthUser::class])->group(function () {
    // Route Discovery
    Route::resource('/', discoveryController::class);

    // Route Book
    Route::resource('/book', bookController::class);
    Route::put('book/{id}/update-status', [bookController::class, 'updateBookStatus'])->name('book.updateStatus');

    // Route Category
    Route::resource('/category', categoryController::class);

    // Route Member
    Route::resource('/member', memberController::class);
    Route::put('member/{id}/update-status', [MemberController::class, 'updateMemberStatus'])->name('member.updateStatus');

    // Route Borrowing
    Route::resource('/borrowing', borrowingController::class);
    Route::put('borrowing/{id}/cancelled', [borrowingController::class, 'cancelledBorrowing'])->name('borrowing.cancelled');
    Route::put('borrowing/{id}/return', [borrowingController::class, 'returnBorrowing'])->name('borrowing.return');
});
