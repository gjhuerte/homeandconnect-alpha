<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Billinginfo extends Eloquent{
		use SoftDeletingTrait;
	public $table = 'tbl_billinginfo';
		protected $dates = ['deleted_at'];
	public $primaryKey = 'billinginfoid';
	public $timestamps = false;
	public $fillable = ['unitno','price','duedate','billdate'];

	public function payment()
	{
		return $this->belongsToMany('Payment','tbl_billingline','billingid','paymentid');
	}

	public function property()
	{
		return $this->belongsTo('Property','unitno','unitno');
	}
}