<?php

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



Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [\App\Http\Controllers\PagesController::class, 'index'])->name('main');
Route::get('/about', [\App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/blog', [\App\Http\Controllers\PagesController::class, 'blog'])->name('blog');
Route::get('/authors', [\App\Http\Controllers\PagesController::class, 'authors'])->name('authors');
Route::get('/contact', [\App\Http\Controllers\PagesController::class, 'contact'])->name('contact');

Route::get('language/{locale}', [\App\Http\Controllers\LanguageController::class, 'change'])->name('change_lang');

Route::resources([
    'post' => \App\Http\Controllers\PostController::class,
    'comment' => \App\Http\Controllers\CommentController::class,
]);
require __DIR__.'/auth.php';
