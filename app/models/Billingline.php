<?php

 use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Billingline extends Eloquent{
		use SoftDeletingTrait;
	public $timestamps = false;
		protected $dates = ['deleted_at'];
	
}