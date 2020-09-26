<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hit;

class HitController extends Controller
{
    public function index($id) {
        $hits = Hit::where('house_id', $id)->get();

        return response()->json([
            'success' => true,
            'count' => $hits->count(),
            'data' => $hits,
        ]);
    }
}
