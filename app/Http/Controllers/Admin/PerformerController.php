<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Performer;
use Illuminate\Http\Request;

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
        //
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
        //
    }

    // DELETE
    public function destroy(Performer $performer)
    {
        $performer->delete();
        return redirect()->route('performers.index');
    }
}
