<?php

class RentalPaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{ 
		$bills = Billinginfo::has('payment','=',0)->get();
		return  View::make('payment.rental.create')->with('billinginfo',$bills);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Input::get('pay') == 'Pay')
		{
			$billinginfo = Billinginfo::find(Input::get('billinginfo'));
			$payment = Payment::create([
					'paymenttype' => 'deposit',
					'date' => Carbon\Carbon::now()->toDateTimeString(),
					'amount' => $billinginfo->price
				]);

			$billinginfo->payment()->save($payment,['status' => 'paid']);
			Session::flash('success-message','Transaction completed!');
			return Redirect::to('payment/rental');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
