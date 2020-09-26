<?php

namespace App\Http\Controllers\upr;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\House;

class HitController extends Controller
{
    public function index($house_id) {
        
        $house = House::find($house_id);

        $messages = DB::table('messages')
            ->where('messages.house_id', '=', $house_id)
            ->orderBy('messages.created_at', 'DESC')
            ->get();

        $count_messages = $messages->count();

        $hits = DB::table('hits')
            ->where('hits.house_id', '=', $house_id)
            ->orderBy('hits.created_at', 'DESC')
            ->get();

        $count_hits = $hits->count();
        
		return view('upr.hits.index', compact('house', 'count_messages', 'count_hits' ));
	}
}
