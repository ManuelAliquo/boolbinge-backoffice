<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Content;

class ContentController extends Controller
{
    // index
    public function index()
    {
        $contents = Content::with('genres')->get();

        return response()->json([
            'success' => true,
            'data' => $contents
        ]);
    }

    // show
    public function show(Content $content)
    {
        $content->load('genres');

        return response()->json([
            'success' => true,
            'data' => $content
        ]);
    }
}
