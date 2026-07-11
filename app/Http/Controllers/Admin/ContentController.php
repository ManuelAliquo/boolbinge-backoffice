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
        $movies = Content::where('type', 'movie')->get();
        $shows  = Content::where('type', 'show')->get();
        $anime  = Content::where('type', 'anime')->get();

        return view('contents.index', compact('movies', 'shows', 'anime'));
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
        $newContent->short_description = $data['short_description'];
        $newContent->long_description = $data['long_description'];
        $newContent->trailer = $data['trailer'];
        $newContent->type = $data['type'];
        $newContent->release_year = $data['release_year'];
        $newContent->end_year = ($data['type'] !== 'movie') ? $data['end_year'] : null;
        $newContent->rating = $data['rating'];
        $newContent->production = $data['production'];
        $newContent->length = $data['length'];

        if (array_key_exists('cover_image', $data)) {
            $imgUrl = Storage::putFile('cover_images', $data['cover_image']);
            $newContent->cover_image = $imgUrl;
        }

        $newContent->save();

        if (isset($data['genres'])) $newContent->genres()->attach($data['genres']);

        return redirect()->route('contents.index');
    }

    // SHOW
    public function show(Content $content)
    {
        return view('contents.show', compact('content'));
    }

    // EDIT
    public function edit(Content $content)
    {
        $types = ['movie', 'show', 'anime'];
        $genres = Genre::all();
        return view('contents.edit', compact('content', 'genres', 'types'));
    }

    // UPDATE
    public function update(Request $request, Content $content)
    {
        $data = $request->all();

        $slug = Str::slug($data['title']);

        $content->title = $data['title'];
        $content->slug = $slug;
        $content->short_description = $data['short_description'];
        $content->long_description = $data['long_description'];
        $content->trailer = $data['trailer'];
        $content->type = $data['type'];
        $content->release_year = $data['release_year'];
        $content->end_year = ($data['type'] !== 'movie') ? $data['end_year'] : null;
        $content->rating = $data['rating'];
        $content->production = $data['production'];
        $content->length = $data['length'];

        if (array_key_exists('cover_image', $data)) {
            if ($content->cover_image && !str_starts_with($content->cover_image, 'imgs/')) {
                Storage::delete($content->cover_image);
            }

            $imgUrl = Storage::putFile('cover_images', $data['cover_image']);
            $content->cover_image = $imgUrl;
        }

        $content->save();

        if (isset($data['genres'])) $content->genres()->sync($data['genres']);
        else $content->genres()->sync([]);

        return redirect()->route('contents.show', $content);
    }

    // DELETE
    public function destroy(Content $content)
    {
        if ($content->cover_image && !str_starts_with($content->cover_image, 'imgs/')) {
            Storage::delete($content->cover_image);
        }

        $content->delete();
        return redirect()->route('contents.index');
    }
}
