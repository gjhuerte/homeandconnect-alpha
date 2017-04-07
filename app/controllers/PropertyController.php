<?php

class PropertyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$property = Property::all();
		return View::make('maintenance.property.index')->with('property',$property);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('maintenance.property.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$property = new Property();
		$property->unitno = Input::get('unitno');
		$property->price = Input::get('price');
		$property->address = Input::get('address');
		$property->description = Input::get('description');
		$property->status = 'lease';
		$property->save();
		Session::flash('success-message','Property Added');
		return Redirect::to('maintenance/property');
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

	public function findHousePrice()
	{
		if(Request::ajax())
		{
			$array = Property::where('unitno','=',Input::get('unitno'))->first();
			return json_encode($array);
		}
	}

	public function findUnusedHouse()
	{
		if(Request::ajax())
		{
			$array = DB::select("SELECT * FROM tbl_housedesc WHERE unitno != '".Input::get('unitno')."' AND status = 'lease'");
			return json_encode($array);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$property = Property::findOrFail($id);
		return View::make('maintenance.property.update')->with('property',$property);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$property = Property::findOrFail($id);
		$property->unitno = Input::get('unitno');
		$property->price = Input::get('price');
		$property->address = Input::get('address');
		$property->description = Input::get('description');
		$property->status = 'lease';
		$property->save();
		Session::flash('success-message','Property Updated');
		return Redirect::to('maintenance/property');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$property = Property::findOrFail($id);
		$property->delete();
		Session::flash('success-message','Record deleted');
		return Redirect::to('maintenance/property');
	}


}
