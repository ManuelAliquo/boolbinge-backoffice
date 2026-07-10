<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
    // index
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'data' => $genres
        ]);
    }

    // show
    public function show(Genre $genre)
    {
        $genre->load('contents');

        return response()->json([
            'success' => true,
            'data' => $genre
        ]);
    }
}
