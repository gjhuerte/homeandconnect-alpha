<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Complaints extends Eloquent{
		use SoftDeletingTrait;

	protected $table = 'tbl_complaint';
	public $primaryKey = 'complaintid';
	protected $dates = ['deleted_at'];
	public $fillable = ['unitno','personalid','title','description','complaint_date'];
	public $timestamps = true;

	public static $rules = [
		'title' => 'required|string',
		'description' => 'required|string|between:5,100'
	];

	public function personalinfo()
	{
		return $this->belongsTo('Personalinfo','personalid','personalid');
	}

	public function property()
	{
		return $this->belongsTo('Property','unitno','unitno');
	}

	public function solution()
	{
		return $this->belongsToMany('Solutions','tbl_complaintstatus','complaintid','solutionid');
	}

}