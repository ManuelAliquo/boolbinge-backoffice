<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Performer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PerformerController extends Controller
{
    // INDEX
    public function index()
    {
        $performers = Performer::all();
        return view('performers.index', compact('performers'));
    }

    // CREATE
    public function create()
    {
        $contents = Content::all();
        return view('performers.create', compact('contents'));
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->all();
        $newPerformer = new Performer();

        $newPerformer->name = $data['name'];
        $newPerformer->slug = Str::slug($data['name']);

        if (array_key_exists('picture', $data)) {
            $imgUrl = Storage::putFile('pictures', $data['picture']);
            $newPerformer->picture = $imgUrl;
        }

        $newPerformer->save();

        return redirect()->route('performers.show', $newPerformer);
    }

    // SHOW
    public function show(Performer $performer)
    {
        return view('performers.show', compact('performer'));
    }

    // EDIT
    public function edit(Performer $performer)
    {
        $contents = Content::all();
        return view('performers.edit', compact('performer', 'contents'));
    }

    // UPDATE
    public function update(Request $request, Performer $performer)
    {
        $data = $request->all();

        $performer->name = $data['name'];
        $performer->slug = Str::slug($data['name']);

        if (array_key_exists('picture', $data)) {
            if ($performer->picture && !str_starts_with($performer->picture, 'imgs/')) {
                Storage::delete($performer->picture);
            }

            $imgUrl = Storage::putFile('performers-pictures', $data['picture']);
            $performer->picture = $imgUrl;
        }

        $performer->save();

        if (isset($data['contents'])) $performer->contents()->sync($data['contents']);
        else $performer->contents()->sync([]);

        return redirect()->route('performers.show', $performer);
    }

    // DELETE
    public function destroy(Performer $performer)
    {
        if ($performer->picture && !str_starts_with($performer->picture, 'imgs/')) {
            Storage::delete($performer->picture);
        }

        $performer->delete();
        return redirect()->route('performers.index');
    }
}
