<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Login extends Eloquent{
		use SoftDeletingTrait;

	public $table = 'tbl_userlogin';
		protected $dates = ['deleted_at'];
	public $primaryKey = 'username';
	public $timestamps = false;
	public $fillable = ['date'];
	public function user()
	{
		return $this->belongsTo('User');
	}
}