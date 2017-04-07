<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Rent extends Eloquent{
		use SoftDeletingTrait;

	public $table = 'tbl_rent';
		protected $dates = ['deleted_at'];
	public $primaryKey = 'rentid';
	public $timestamps = true;
	const CREATED_AT = 'rentday';
	const UPDATED_AT = null;
	public $fillable = ['personalid','unitno'];

	public function property()
	{
		return $this->hasOne('Property','unitno','unitno');
	}

	public function personalinfo()
	{
		return $this->hasOne('Personalinfo','personalid','personalid');
	}
}