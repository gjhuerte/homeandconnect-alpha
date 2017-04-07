<?php

class TransferController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$property = Property::where('status','=','occupied')->get();
		return View::make('rent.transfer.index')->with('property',$property);
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
		$unit1 = Input::get('unitno');
		$unit2 = Input::get('transferto');
		$property = new Property;
		//compare two amount and if not equal, return error
		if($property->getAmount($unit1) <> $property->getAmount($unit2) )
		{
			Session::flash('error-message','RENTAL PAYMENT DIFFERENCE! You need to finish your current contract before renting another property');
			return Redirect::to('property/transfer');
		}

		$rent = Rent::where('unitno','=',$unit1)->first();
		$rent->unitno = $unit2;
		$rent->save();

		Session::flash('success-message','Transaction completed');
		return Redirect::to('property/transfer');
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
