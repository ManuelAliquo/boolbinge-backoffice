<?php

use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\PerformerController;
use Illuminate\Support\Facades\Route;

// genres
Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{genre:slug}', [GenreController::class, 'show']);

// performers
Route::get('performers', [PerformerController::class, 'index']);
Route::get('performers/{performer:slug}', [PerformerController::class, 'show']);

// contents
Route::get('contents', [ContentController::class, 'index']);
Route::get('contents/{content:slug}', [ContentController::class, 'show']);
