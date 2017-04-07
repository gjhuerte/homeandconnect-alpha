<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Logout extends Eloquent{
		use SoftDeletingTrait;

	public $table = 'tbl_userlogout';
		protected $dates = ['deleted_at'];
	public $primaryKey = 'username';
	public $timestamps = false;
	public $fillable = ['date'];
	public function user()
	{
		return $this->belongsTo('User');
	}	
}