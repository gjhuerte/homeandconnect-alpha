<?php

class AdvancePaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$property = Property::all();
		return View::make('payment.advance.create')
			->with('property',$property);
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
		$amount = Input::get('amount');
		$unitno = Input::get('unitno');
		$months = Input::get('months');
		$property = new Property;

		$payment = Payment::create([
				'paymenttype' => 'advance',
				'date' => Carbon\Carbon::now()->toDateTimeString(),
				'amount' => $amount
			]);

		for( $ctr = 1 ; $ctr <= $months ; $ctr++ ){
			
			($ctr > 1) ? $duedate = Carbon\Carbon::now()->addMonths($ctr) : $duedate = Carbon\Carbon::now()->addMonth();
			
			$billinginfo = Billinginfo::create([
					'unitno' => $unitno,
					'price' => $property->getAmount($unitno),
					'duedate' => $duedate,
					'billdate' => Carbon\Carbon::now()->toDateTimeString()
				]);

			$billinginfo->payment()->save($payment,['status' => 'paid']);
		}

		Session::flash('success-message','Transaction Completed!');
		return Redirect::to('payment/advance');
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
