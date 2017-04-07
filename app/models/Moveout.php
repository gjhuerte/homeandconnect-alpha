<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Moveout extends Eloquent{
		use SoftDeletingTrait;
	
	protected $table = 'tbl_moveout';
		protected $dates = ['deleted_at'];
	public $timestamps = false;
	public $fillable = ['unitno','moveoutdate'];

	public static $rules = [
		'move out date' => 'required|date'
	];

	public function property()
	{
		return $this->belongsTo('Property','unitno','unitno');
	}

}