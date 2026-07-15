<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Performer;

class PerformerController extends Controller
{
    // index
    public function index()
    {
        $performers = Performer::all();

        return response()->json([
            'success' => true,
            'data' => $performers
        ]);
    }

    // show
    public function show(Performer $performer)
    {
        $performer->load('contents');

        return response()->json([
            'success' => true,
            'data' => $performer
        ]);
    }
}
