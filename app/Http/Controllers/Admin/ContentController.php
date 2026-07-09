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
    // INDEX
    public function index()
    {
        $contents = Content::all();
        return view('contents.index', compact('contents'));
    }

    // CREATE
    public function create()
    {
        $types = ['movie', 'show', 'anime'];
        $genres = Genre::all();
        return view('contents.create', compact('genres', 'types'));
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->all();
        $newContent = new Content();

        $slug = Str::slug($data['title']);

        $newContent->title = $data['title'];
        $newContent->slug = $slug;
        $newContent->description = $data['description'];
        $newContent->type = $data['type'];
        $newContent->release_year = $data['release_year'];

        if (array_key_exists('cover_image', $data)) {
            $imgUrl = Storage::putFile('cover_images', $data['cover_image']);
            $newContent->cover_image = $imgUrl;
        }

        $newContent->save();
        return redirect('contents');
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
