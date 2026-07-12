<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    // INDEX
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    // CREATE
    public function create()
    {
        return view('genres.create');
    }

    // STORE
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|unique:genres|max:255',
            'description' => 'nullable|string'
        ]);

        // creation
        $data = $request->all();
        $newGenre = new Genre();

        $newGenre->name = $data['name'];
        $newGenre->slug = Str::slug($data['name']);
        $newGenre->description = $data['description'];

        $newGenre->save();

        return redirect()->route('genres.show', $newGenre);
    }

    // SHOW
    public function show(Genre $genre)
    {
        $contents = $genre->contents;
        return view('genres.show', compact('genre', 'contents'));
    }

    // EDIT
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    // UPDATE
    public function update(Request $request, Genre $genre)
    {
        $data = $request->all();

        $genre->name = $data['name'];
        $genre->slug = Str::slug($data['name']);
        $genre->description = $data['description'];

        $genre->save();

        return redirect()->route('genres.show', $genre);
    }

    // DELETE
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
