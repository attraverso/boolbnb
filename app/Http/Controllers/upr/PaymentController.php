<?php

namespace App\Http\Controllers\upr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\House;
use App\Models\Advert;
use Illuminate\Support\Facades\Auth;
use Braintree\Transaction as Transaction;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$payments = Payment::all();
		return view('upr.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $house = House::find($id);
        $adverts = Advert::all();
        return view('upr.payments.create', compact('house', 'adverts'));
	}
	
	public function store()
	{
		//TODO: update once the create view is done
		return redirect()->route('upr.payments.index');
	}

    public function checkout(Request $request, $id) {
        $amount = $request->payment_amount;
        $nonce = $request->payment_method_nonce;

        $status = Transaction::sale([
            'amount' => $amount,
			'paymentMethodNonce' => $nonce,
			'customer' => [
				'firstName' => Auth::user()->first_name,
				'lastName' => Auth::user()->last_name,
				'email' => Auth::user()->email,
			],
            'options' => [
                'submitForSettlement' => true
			]
		]);

        if ($status->success) {
			$transaction = $status->transaction;
			$newPayment = new Payment();
			switch ($amount) {
				case '2.99':
					$newPayment->advert_id = 1;
					break;
				case '5.99':
					$newPayment->advert_id = 2;
					break;
				case '9.99':
					$newPayment->advert_id = 3;
					break;
			}
			$newPayment->house_id = $id;
			$newPayment->status = $transaction->status;
			$newPayment->payment_id = $transaction->id;
			$newPayment->save();
    
            return back()->with('success_message', 'Transaction successful.');
        } else {
            $errorString = "";
    
            foreach ($status->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An error occurred with the message: ' . $status->message);
        }
    }
}