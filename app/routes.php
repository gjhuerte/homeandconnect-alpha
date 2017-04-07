<?php
 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(['before'=>'auth'],function(){

	Route::resource('dashboard','HomeController@home');

	Route::get('home','HomeController@home');

	Route::get('settings',['uses'=>'SessionsController@edit']);

	Route::get('complaints/create',['as'=>'complaints.create','uses'=>'ComplaintsController@create']);

	Route::post('complaints',['as'=>'complaints.store','uses'=>'ComplaintsController@store']);

	Route::put('settings',['as'=>'account.update','uses'=>'SessionsController@update']);

});



Route::group(['before'=>'auth|admin'],function(){

	Route::get('logout',['before'=>'session','uses'=>'SessionsController@destroy']);
	
	Route::get('complaints',['as'=>'complaints.index','uses'=>'ComplaintsController@index']);

	Route::get('action',['as'=>'complaints.edit','uses'=>'ComplaintsController@edit']);

	Route::put('action',['as'=>'complaints.update','uses'=>'ComplaintsController@update']);

	Route::resource('maintenance/tenant','TenantsController');

	Route::resource('maintenance/property','PropertyController');

	Route::resource('payment/rental','RentalPaymentController');

	Route::resource('payment/advance','AdvancePaymentController');

	Route::resource('property/lease','RentController');

	Route::resource('property/transfer','TransferController');

	Route::resource('property/moveout','MoveOutController');

	Route::resource('solution','SolutionsController');
	//ajax retrieving property price
	Route::post('findHousePrice',array('uses'=>'PropertyController@findHousePrice'));
	//ajax retrieving unused property
	Route::post('findUnusedHouse',array('uses'=>'PropertyController@findUnusedHouse'));

});

Route::filter('admin',function(){
	if(Auth::user()->access_level != 0 ) return Redirect::to('dashboard');
});

Route::group(['before'=>'session_start'], function () {
	
	Route::resource('/', 'HomeController@index');

	Route::resource('signup','SignupController');

	Route::resource('login','SessionsController');
    // ... another resource ...
});

Route::filter('session_start',function(){
	if( Auth::check() )
	{
		return Redirect::to('dashboard');
	}
});	
