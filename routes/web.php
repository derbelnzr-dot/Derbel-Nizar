<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/heure', [PageController::class, 'time'])->name('time');

Route::get('/posts/archive/{year}', [PostController::class, 'archive'])
    ->whereNumber('year')
    ->name('posts.archive');

Route::resource('posts', PostController::class)->except(['edit', 'update', 'destroy'])->names([
    'index' => 'posts.index',
    'show' => 'posts.show',
    'create' => 'posts.create',
    'store' => 'posts.store',
]);

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update.patch');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
