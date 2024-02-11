<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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
    Route::get('/blog/create', [BlogController::class, 'createBlog'])->name('blog.create');
    Route::post('/blog/', [BlogController::class, 'addBlog'])->name('blog.add');
    Route::get('/blog/', [BlogController::class, 'viewBlog'])->name('blog.view');
    Route::get('/blog/{blog}/edit', [BlogController::class, 'editForm'])->name('blog.editForm');
    Route::put('/blog/{blog}/update', [BlogController::class, 'blogUpdate'])->name('blog.update');
    Route::delete('/blog/{blog}/delete', [BlogController::class, 'blogDelete'])->name('blog.delete');
});

require __DIR__.'/auth.php';
