<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

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
        //
    }

    // STORE
    public function store(Request $request)
    {
        //
    }

    // SHOW
    public function show(string $id)
    {
        //
    }

    // EDIT
    public function edit(string $id)
    {
        //
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        //
    }

    // DELETE
    public function destroy(string $id)
    {
        //
    }
}
