<?php

use App\Http\Controllers\Admin\ContentController as AdminContentController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\PerformerController as AdminPerformerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // genre routes
    Route::resource('genres', AdminGenreController::class)->except('show');
    Route::get('/genres/{genre}', [AdminGenreController::class, 'show'])->name('genres.show');

    // performer routes
    Route::resource('performers', AdminPerformerController::class)->except('show');
    Route::get('/performers/{performer}', [AdminPerformerController::class, 'show'])->name('performers.show');

    // content routes
    Route::resource('contents', AdminContentController::class)->except('show');
    Route::get('/contents/{content}', [AdminContentController::class, 'show'])->name('contents.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
