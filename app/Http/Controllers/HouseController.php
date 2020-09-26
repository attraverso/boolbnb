<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Hit;
use Braintree\Transaction as Transaction;
use Illuminate\Support\Carbon;

class HouseController extends Controller
{
	/**
	 * Retrieve advert status data from braintree +
	 * Show freshly updated advertised homes in view
	 */
    public function homepage() {
		/* get all unconfirmed payments */
        $payments = Payment::where('status', '=', 'submitted_for_settlement')->get();
		foreach ($payments as $payment) {
			$transaction = Transaction::find($payment->payment_id);
			/* check whether any has changed status on braintree and update local db */
			$payment->update(['status' => $transaction->status]);
			if ($payment->status == 'settled') {
				/* if the payment is confirmed, mark the advert as active */
				$payment->house->update(['advertised' => 1]);
				/* set start and end datetime for advert */
				$payment->update(['starting_datetime' => Carbon::now()]);
				switch ($payment->advert_id) {
					case 1:
						$payment->update(['expiration_datetime' => Carbon::now()->addDays(1)]);
						break;
					case 2:
						$payment->update(['expiration_datetime' => Carbon::now()->addDays(3)]);
						break;
					case 3:
						$payment->update(['expiration_datetime' => Carbon::now()->addDays(6)]);
						break;
				}
			}
		}
		
		/* get all the newly expired adverts and mark the house advert as false*/
		$advertisedHomes = House::leftJoin('payments', 'houses.id', '=', 'payments.house_id')
			->where('advertised', 1)
			->where('starting_datetime', '>', Carbon::now()->subDays(7))
			->where('expiration_datetime', '<', Carbon::now())
			->get();
		foreach ($advertisedHomes as $advertisedHome) {
			if ($advertisedHome->advertised == 1) {
                $advertisedId = $advertisedHome->house_id;
                $advertHouse = House::find($advertisedId);
                $advertHouse->update(['advertised' => 0]);
			}
		}
		
		/** send all advertised AND visible houses to the view */
		$houses = House::where('advertised', true)
            ->where('visible', 1)
            ->inRandomOrder()
            ->limit(6)
			->get();
		return view('guest.houses.homepage', compact('houses'));
	}

	public function show($id)
    {
		/**the list of services is grabbed from the frontend */
		$house = House::find($id);
		if ($house) {
			$hit = new Hit();
			$hit->timestamps = false;
			$hit->house_id = $id;
			$hit->created_at = now();
			$hit->save();
			return view('guest.houses.show', compact('house'));
		} else {
			return abort('404');
		}
	}
	
	/**
	 * Gather and deliver all the data needed from the upr.houses.search view
	 */
	public function search(Request $request) {
		//get the address inputed in homepage and show it in searchbar in search page
		$userQuery = $request->user_search_address;
				$houses = House::where('visible', '1')
                    ->where('advertised', '1')
                    ->inRandomOrder()
					->limit(3)
					->get();
		//get all services, to print home filter input items in the page
		$services = Service::all();
		$data = [
			'userQuery' => $userQuery,
			'houses' => $houses,
			'services' => $services,
		];
		return view('guest.houses.search', $data);
	}
};
