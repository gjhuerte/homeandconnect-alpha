<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Solutions extends Eloquent{
		use SoftDeletingTrait;

	protected $table = 'tbl_solution';
	public $primaryKey = 'solutionid';
	protected $dates = ['deleted_at'];
	public $fillable = ['response','complaintid','date'];
	public $timestamps = false;

	public function complaints()
	{
		return $this->belongsToMany('Complaints','tbl_complaintstatus','complaintid','solutionid');
	}

}