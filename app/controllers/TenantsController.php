<?php

use Carbon\Carbon;
class TenantsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = Personalinfo::all();
		return View::make('maintenance.tenant.index')->with('users',$users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//instantiate personalinfo
		$personalinfo = Personalinfo::create([
			'lastname' => Input::get('lastname'),
			'firstname' => Input::get('firstname'),
			'middlename' => Input::get('middlename'),
			'cellno' => Input::get('cellno'),
			'birthdate' => Carbon::parse(Input::get('birthdate')),
			'email' => Input::get('email'),
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
		Session::put('message','Account created');
		return Redirect::to('maintenance/tenant');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$personalinfo = Personalinfo::findOrFail($id);
		return View::make('maintenance.tenant.update')
			->with('personalinfo',$personalinfo);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$personalinfo = Personalinfo::findOrFail($id);
		$personalinfo->lastname = Input::get('lastname');
		$personalinfo->firstname = Input::get('firstname');
		$personalinfo->middlename = Input::get('middlename');
		$personalinfo->birthdate = Carbon::parse(Input::get('birthdate'));
		$personalinfo->email = Input::get('email');
		$personalinfo->gender = Input::get('gender');
		$personalinfo->cellno = Input::get('cellno');
		$personalinfo->save();
		Session::flash('message','Record Updated');
		return Redirect::to('maintenance/tenant');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		$user = User::findOrFail($id);
		$user->delete();
		$personalinfo = Personalinfo::findOrFail($id);
		$personalinfo->delete();
		Session::flash('message','Record deleted');
		return Redirect::to('maintenance/tenant');
	}


}
