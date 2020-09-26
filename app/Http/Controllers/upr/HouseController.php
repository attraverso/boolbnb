<?php

namespace App\Http\Controllers\upr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\support\facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // grab id of current upr and make it match user_id
        $houses = DB::table('users')
            ->join('houses', 'users.id', '=', 'houses.user_id')
            ->where('houses.user_id', '=', Auth::user()->id)
            ->orderBy('houses.created_at', 'DESC')
            ->get();

		return view('upr.houses.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('upr.houses.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title' => 'required|max:250',
			'nr_of_rooms' => 'required|integer|min:0',
			'nr_of_beds' => 'required|integer|min:0',
			'nr_of_bathrooms' => 'integer|min:0|nullable',
			'square_mt' => 'integer|min:1|nullable',
			'address' => 'required',
			'image_path' => 'image|nullable',
			'description' => 'max:2000|nullable',
		]);

		//TODO: address manipulation
		$houseData = $request->all();//in mezzo ci sono sia le cose che vanno in houses che quelle che vanno in services -> SEPARARE I CAMPI!
		$newHouse = new House();
		$newHouse->fill($houseData);
		if(array_key_exists('image_path', $houseData)) {
			$newHouse->image_path = Storage::put('uploads', $houseData['image_path']);
		}
		$newHouse->save();
		if (!empty($houseData['services_ids'])) {
			$newHouse->services()->sync($houseData['services_ids']);
    	}

		return redirect()->route('upr.houses.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = House::find($id);
        $services = Service::all();
		if ($house) {
			return view('upr.houses.edit', compact('house', 'services'));
		} else {
			return abort('404');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
			'title' => 'required|max:250',
			'nr_of_rooms' => 'required|integer|min:0',
			'nr_of_beds' => 'required|integer|min:0',
			'nr_of_bathrooms' => 'integer|min:0',
			'square_mt' => 'integer|min:1',
			'address' => 'required',
			'image_path' => 'image',
			'description' => 'max:2000',
		]);

		$data = $request->all();
		$house = House::find($id);
		$house->update($data);
		if (!empty($data['services_ids'])) {
			$house->services()->sync($data['services_ids']);
    	} else {
			$house->services()->sync([]);
		}
		return redirect()->route('upr.houses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$house = House::find($id);
		$house->delete();
		return redirect()->route('upr.houses.index');
	}


	/**
	 * From upr.houses.show, mark home as visible/non visible in the db
	 */
    public function toggleVisibility($id) {
        $house = House::find($id);

        if($house->visible == 0) {
            $house->update(['visible'=> 1]);
        } else {
            $house->update(['visible'=> 0]);
        }
        return redirect()->back();
    }

}
