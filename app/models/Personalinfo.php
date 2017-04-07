<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon;
 use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Personalinfo extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tbl_personalinfo';
		protected $dates = ['deleted_at'];
	protected $primaryKey = 'personalid';
	public $timestamps = false;
	public $fillable = [
		'lastname',
		'firstname',
		'middlename',
		'birthdate',
		'email',
		'cellno',
		'gender'
	];

	public static $rules = [
		'lastname' => 'required|min:2|max:30',
		'firstname' => 'required|min:2|max:30',
		'middlename' => 'required|min:2|max:30',
		'birthdate' => 'required',
		'email' => 'required|email',
		'gender' => 'required',
		'cellphone number' => 'required|size:11'
	];

	public function user()
	{
		return $this->hasOne('User','userid','personalid');
	}

	public function property()
	{
		return $this->belongsToMany('Property','tbl_rent','personalid','unitno');
	}
}
