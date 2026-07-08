<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::all();
        return view('contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = ['movie', 'show', 'anime'];
        $genres = Genre::all();
        return view('contents.create', compact('genres', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // $newContent = new Content();

        // $slug = Str::slug($data['title']);

        // $newContent->title = $data['title'];
        // $newContent->slug = $slug;
        // $newContent->description = $data['description'];
        // $newContent->type = $data['type'];
        // $newContent->cover_image = $data['cover_image'];
        // $newContent->release_year = $data['release_year'];

        // $newContent->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
