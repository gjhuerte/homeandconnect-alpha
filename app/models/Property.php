<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon;
 use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Property extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tbl_housedesc';
		protected $dates = ['deleted_at'];
	protected $primaryKey = 'unitno';
	public $timestamps = false;
	public $fillable = [
		'unitno',
		'description',
		'address',
		'status',
		'price'
	];

	public function getAmount($value)
	{
		return Property::select('price')->where('unitno','=',$value)->first();
	}

	public function personalinfo()
	{
		return $this->belongsToMany('Personalinfo','tbl_rent','unitno','personalid')
			->withPivot('rentday','rentday');
	}

	public function billinginfo()
	{
		return $this->hasMany('Billinginfo','unitno','unitno');
	}

	public function moveout()
	{
		return $this->hasOne('Moveout','unitno','unitno');
	}
}
