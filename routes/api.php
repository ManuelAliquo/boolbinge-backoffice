<?php

use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('contents', [ContentController::class, 'index']);

Route::get('contents/{content}', [ContentController::class, 'show']);

Route::get('genres', [GenreController::class, 'index']);

Route::get('genres/{genre}', [GenreController::class, 'show']);
