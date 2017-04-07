<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class ContractStatus extends Eloquent{
		use SoftDeletingTrait;
	public $table = 'tbl_contractstatus';
		protected $dates = ['deleted_at'];
	public $timestamps = false;
	public $fillable = ['paymenttype','status'];
}