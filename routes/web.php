<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'homepage'])->name('home');
Route::get('/postdetail/{id}',[UserController::class,'postDetail'])->name('postdetail');

Route::get('/dashboard', [UserController::class,'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'home'])->name('admin.dashboard');
    Route::get('/dashboard/posts', [PostController::class, 'index'])->name('admin.posts');
    Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('admin.createpost');
    Route::post('/dashboard/posts/create', [PostController::class, 'store'])->name('admin.addpost');
    Route::get('/dashboard/posts/edit/{id}',[PostController::class,'edit'])->name('admin.editpost');
    Route::put('/dashboard/posts/update/{id}',[PostController::class,'update'])->name('admin.updatepost');
    Route::delete('/dashboard/posts/delete/{id}',[PostController::class,'destroy'])->name('admin.deletepost');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
