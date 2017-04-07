<?php

class RentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$personalinfo = Personalinfo::all();
		$property = Property::where('status','=','lease')->get();
		return View::make('rent.index')
			->with('personalinfo',$personalinfo)
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
		$unitno = Input::get('unitno');
		$tenantno = Input::get('tenantno');
		$amount = Input::get('amount');

		$contract = Contract::create([
				'unitno'=> $unitno,
				'date' => Carbon\Carbon::now()->toDateTimeString(),
				'amount' => $amount,
				'months' => 12
			]);

		$payment = Payment::create([
				'paymenttype' => 'deposit',
				'date' => Carbon\Carbon::now()->toDateTimeString(),
				'amount' => $amount
			]);

		$contractstatus = [
				'paymenttype' => 'deposit',
				'status' => 'paid'
			];

		$contract->payment()->attach($payment,$contractstatus);

		$personalinfo = Personalinfo::find($tenantno);
		$personalinfo->property()->attach($unitno,['rentday' => Carbon\Carbon::now()->toDateTimeString()]);	

		$property = Property::find($unitno);
		$property->status = 'occupied';
		$property->save();

		$billinginfo = Billinginfo::create([
				'unitno' => $unitno,
				'price' => $amount,
				'duedate' => Carbon\Carbon::now()->addWeek(),
				'billdate' => Carbon\Carbon::now()->toDateTimeString()
			]);

		$billinginfo->payment()->save($payment,['status' => 'paid']);
		Session::flash('success-message','Property successfully occupied!');
		return Redirect::to('property/lease');
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
