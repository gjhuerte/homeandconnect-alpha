<?php

class SignupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('account.create')
			->with('title','Signup');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make([
			'lastname' => Input::get('lastname'),
			'firstname' => Input::get('firstname'),
			'middlename' => Input::get('middlename'),
			'birthdate' => Input::get('birthdate'),
			'email' => Input::get('email'),
			'cellphone number' => Input::get('cellno'),
			'gender' => Input::get('gender')
		],Personalinfo::$rules);


		if($validator->fails())
		{
			return Redirect::back()
				->with('title','Signup')
				->withErrors($validator)
				->withInput();
		}
		
		$validator = Validator::make([
			'username' => Input::get('username'),
			'password' => Input::get('password')
		],User::$rules);

		if($validator->fails())
		{
			return Redirect::back()
				->with('title','Signup')
				->withErrors($validator)
				->withInput();
		}
		//instantiate personalinfo
		$personalinfo = Personalinfo::create([
			'lastname' => Input::get('lastname'),
			'firstname' => Input::get('firstname'),
			'middlename' => Input::get('middlename'),
			'cellno' => Input::get('cellno'),
			'email' => Input::get('email'),
			'birthdate' => Input::get('birthdate'),
			'gender' => Input::get('gender')
		]);
		//instantiate user
		$user = new User([
			'username' => Input::get('username'),
			'password' => Hash::make(Input::get('password')),
			'access_level' => '1'
		]);	
		//save information
		$personalinfo->user()->save($user);
		//message
		Session::put('success-message','Account created! Login now to view your profile');
		return Redirect::to('login');
	}


}
