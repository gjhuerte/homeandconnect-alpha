<?php

use Carbon\Carbon;
class SessionsController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make([
			'username' => Input::get('username'),
			'password' => Input::get('password')
		],[
			'username' => 'required',
			'password' => 'required'
		]);

		if($validator->fails())
		{
			return Redirect::to('login')
				->withErrors($validator)
				->withInput();
		}

		$user = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];

		if(	Auth::attempt($user) ){
			//get the userid
			$userid = Auth::user()->userid;
			//get the username	
			$username = Auth::user()->username;
			//get the access level
			$access = User::getAccessLevel($username)->access_level;
			//adds username and accesss to session
			Session::put('username',$username);
			Session::put('access',$access);
			//logs
			$this->generateLogin($username);
			//login prompt
			Session::flash('message','Logged in!');
			//return to dashboard
			return Redirect::intended('dashboard');
		}

		Session::flash('error-message','Authentication failed!');
		return Redirect::to('login')
			->withErrors('Incorrect login details');
	}

	public function edit()
	{
		return View::make('account.update')
			->with('personalinfo',Personalinfo::find(Auth::user()->userid));
	}

	public function update()
	{
		$validator = Validator::make([
				'lastname' => Input::get('lastname'),
				'firstname' => Input::get('firstname'),
				'middlename' => Input::get('middlename'),
				'birthdate' => Input::get('birthdate'),
				'email' => Input::get('email'),
				'gender' => Input::get('gender'),
				'cellphone number' => Input::get('cellno')
			],Personalinfo::$rules);
		if($validator->fails())
		{
			return Redirect::to('settings')
				->withErrors($validator)
				->withInput();
		}

		$personalinfo = Personalinfo::find(Auth::user()->userid);
		$personalinfo->lastname = Input::get('lastname');
		$personalinfo->firstname = Input::get('firstname');
		$personalinfo->middlename = Input::get('middlename');
		$personalinfo->birthdate = Carbon::parse(Input::get('birthdate'));
		$personalinfo->email = Input::get('email');
		$personalinfo->gender = Input::get('gender');
		$personalinfo->cellno = Input::get('cellno');
		$personalinfo->save();
		Session::flash('message','Record Updated');
		return Redirect::to('settings');
	}

	public function destroy()
	{
		//fetch the username
		$username = Session::get('username');
		//logs
		$this->generateLogout($username);
		//remove everything from session
		Session::flush();
		//remove everything from auth
		Auth::logout();
		return Redirect::to('/');
	}

	/*
		generate login
	*/
	public function generateLogin($username)
	{
		$user = User::where('username','=',$username)->first();
		$log = new Login([
				'date' => Carbon::now()->toDateTimeString()
			]);
		$user->login()->save($log);

	}

	/*
		generate logout 
	*/
	public function generateLogout($username)
	{
		$user = User::where('username','=',$username)->first();
		$log = new Logout([
				'date' => Carbon::now()->toDateTimeString()
			]);
		$user->logout()->save($log);
	}


}
