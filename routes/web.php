<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;
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

Route::get('/books', [BookController::class, 'index'])->middleware('auth', 'verified')->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->middleware(['auth', 'verified'])->name('books.show');

Route::get('/users', [UserController::class, 'index'])->middleware('auth', 'verified')->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->middleware(['auth', 'verified'])->name('users.show');

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('posts.store');
Route::get('/posts/{post_id}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('posts.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
