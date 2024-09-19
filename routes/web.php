<?php
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/post/delete-all', [PostController::class, 'destroyAll'])->name('posts.destroyAll');


Route::resource('post', PostController::class);