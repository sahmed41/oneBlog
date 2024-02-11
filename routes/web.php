<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Created by The Developer
    Route::get('/blog/create', [BlogController::class, 'createBlog'])->middleware(['admin'])->name('blog.create'); // A route to  the form to create a blog
    Route::post('/blog/add', [BlogController::class, 'addBlog'])->name('blog.add'); // A route to create a blog
    Route::get('/blog/view', [BlogController::class, 'viewBlog'])->middleware(['admin'])->name('blog.view'); // A route to see a list of blogs
    Route::get('/blog/{blog}/edit', [BlogController::class, 'editForm'])->middleware(['admin'])->name('blog.editForm'); // A route to the form to edit blog post
    Route::put('/blog/{blog}/update', [BlogController::class, 'blogUpdate'])->middleware(['admin'])->name('blog.update'); // A route to edit and update blog post
    Route::delete('/blog/{blog}/delete', [BlogController::class, 'blogDelete'])->middleware(['admin'])->name('blog.delete'); // A route to delete blog post
    Route::get('/home',[HomeController::class, 'index'])->name('home'); // After logged in this route will take a visitor to theri appropriate page based on the role
    Route::get('/blog/{blog}/singleBlog',[BlogController::class, 'getBlog'])->name('blog.singleBlog');
});

require __DIR__.'/auth.php';
