<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Contract extends Eloquent{
		use SoftDeletingTrait;
	public $table = 'tbl_contract';
		protected $dates = ['deleted_at'];
	public $primaryKey = 'contractid';
	public $fillable = ['unitno','date','amount','months','contractpath'];
	public $timestamps = false;

	public function payment()
	{
		return $this->belongsToMany('Payment','tbl_contractstatus','contractid','paymentid');
	}
}