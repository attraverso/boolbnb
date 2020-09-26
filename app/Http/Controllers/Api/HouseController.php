<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{

    public function index(Request $request) {
		$query = House::with('services')
		->where('nr_of_rooms', '>=', $request->rooms ?? 0)
		->where('nr_of_beds', '>=', $request->beds ?? 0);
		if ($request['services']) {
			$services = explode(',', $request['services']);
			/** imperfect solution: the query builder adds an extra comma at the end of
			 * the services string, which creates an extra array element
			 * that has to be removed */
			array_pop($services);
			foreach ($services as $service) {
				$query->whereHas('services', function($q) use ($service) {
					$q->where('services.id', $service);
				});
			}
		}
		/** list of houses filtered by given parameters (not distance) */
		$filteredHouses = $query->get();
		
		/** only keep the homes located within the requested distance */
		$matchingHouses = [];
		$standardRadius = 20;
		foreach ($filteredHouses as $house) {
			$twoPointsDistance = self::getDistance($request['longitude'], $request['latitude'], $house->longitude, $house->latitude);
			$house->distance = $twoPointsDistance;
			if ($request->distance == null && $twoPointsDistance < $standardRadius) {
				array_push($matchingHouses, $house);
			} else if ($twoPointsDistance < $request->distance) {
				array_push($matchingHouses, $house);
			}
		}

		/* sort matching homes list by distance */
		usort($matchingHouses, "self::cmp");

		return response()->json([
			'success' => true,
			'count' => count($matchingHouses),
			'data' => $matchingHouses,
		]);
	}

	/* get distance between two sets of coordinates, using the Vincenty formula*/
	protected static function getDistance(
			$latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
		{
			// convert from degrees to radians
			$latFrom = deg2rad($latitudeFrom);
			$lonFrom = deg2rad($longitudeFrom);
			$latTo = deg2rad($latitudeTo);
			$lonTo = deg2rad($longitudeTo);
		
			$lonDelta = $lonTo - $lonFrom;
			$a = pow(cos($latTo) * sin($lonDelta), 2) +
			pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
			$b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
		
			$angle = atan2(sqrt($a), $b);
			return $angle * $earthRadius;
		}

	/* order matching houses by distance */
	protected static function cmp($a, $b) {
		if ($a->distance == $b->distance) {
			return 0;
		}
		return ($a->distance < $b->distance) ? -1 : 1;
	}
}
