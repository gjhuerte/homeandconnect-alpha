<?php

use Carbon\Carbon;
class MoveOutController extends BaseController{
	
	public function index()
	{
		$personalinfo = Personalinfo::all();
		$property = Property::all();
		return View::make('rent.destroy')
			->with('personalinfo',$personalinfo)
			->with('property',$property);
	}

	public function store()
	{
		$moveoutdate = Carbon::parse(Input::get('moveoutdate'));
		$unitno = Input::get('unitno');

		$validator = Validator::make([
				'move out date' => $moveoutdate
			],Moveout::$rules);

		Moveout::create([
				'moveoutdate' => $moveoutdate,
				'unitno' => $unitno
			]);

		Session::flash('success-message','Move out scheduled');
		return Redirect::to('property/moveout');
	}
}