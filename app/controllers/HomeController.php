<?php

use Carbon\Carbon;
class HomeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 return View::make('index');
	}

	public function home()
	{
		//checks for billing
		$this->checkForBilling();
		$this->scheduleMoveOut();
		if(Auth::user()->access_level == '0')
		{
			$property = Property::all();
			$tenant = Personalinfo::all();
			return View::make('dashboard.admin.index')
				->with('billinginfo',Billinginfo::all())
				->with('moveouts',Moveout::all())
				->with('rents',Rent::all())
				->with('property',$property)
				->with('tenant',$tenant);
		}else{
			$property = Property::all();
			$user = User::find(Auth::user()->userid);
			return View::make('dashboard.tenant.index')
				->with('billinginfo',Billinginfo::all())
				->with('moveouts',Moveout::all())
				->with('rents',Rent::all())
				->with('property',$property)
				->with('complaints',Complaints::where('personalid','=',$user->personalinfo->personalid)->get());
		}
	}
}
