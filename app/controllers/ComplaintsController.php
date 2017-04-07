<?php

class ComplaintsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$complaints = Complaints::all();
		return View::make('complaints.index')
			->with('complaints',$complaints);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$property = Property::lists('unitno','unitno');
		return View::make('complaints.create')
			->with('property',compact('property'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$title = Input::get('title');
		$description = Input::get('description');
		$unitno = Input::get('unitno');
		$personalid = "";
	   foreach( User::where('username','=',Auth::user()->username)->get() as $user)
	   {
           	if(count($user->personalinfo) > 0) $personalid = $user->personalinfo->personalid;
           
	   }

		$validator = Validator::make([
				'title' => $title,
				'description' => $description
			],Complaints::$rules);

		if($validator->fails())
		{
			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}


		Complaints::create([
				'unitno' => $unitno,
				'personalid' => $personalid,
				'title' => $title,
				'description' => $description,
				'complaint_date' => Carbon\Carbon::now()->toDateString()
			]);

		Session::flash('success-message','Complaint reported');
		return Redirect::to('complaints/create');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$complaint = Complaints::find($id);
		return View::make('complaint.action')
			->with('complaint',$complaint);
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
