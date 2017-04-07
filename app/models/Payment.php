<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Payment extends Eloquent{
		use SoftDeletingTrait;
	public $table = 'tbl_payment';
		protected $dates = ['deleted_at'];
	public $primaryKey = 'paymentid';
	public $timestamps = false;
	public $fillable = ['date','paymenttype','amount'];

	public function contract()
	{
		return $this->belongsToMany('Contract','tbl_contractstatus','contractid','paymentid');
	}

	public function billinginfo()
	{
		return $this->belongsToMany('Billinginfo','tbl_billingline','billingid','paymentid');
	}
}