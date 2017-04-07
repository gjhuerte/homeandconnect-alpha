<?php

use Carbon\Carbon;
class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/*
		verifies if today is end of the month, 28 is our end of month return true if end false if not
	*/
	public function isEndOfMonth($currentday,$rentday)
	{
		( $rentday == 29 || $rentday == 30 || $rentday == 31 ) ? $rentday = 28 : $rentday = $rentday;
		( $currentday == $rentday ) ? $ret_val = true : $ret_val = false;
		return $ret_val;
	}

	/*
		check if billing already exists, if not, generate
	*/
	public function checkForBilling()
	{
		$currentday = Carbon::parse(Carbon::now())->endOfMonth()->day;
		$currentDate = Carbon::now()->toDateTimeString();
		$property = Property::all();

		foreach($property as $unit)
		{
			//fetch unitno and price
			$unitno = $unit->unitno;
			$amount  = $unit->price;
			//check if the property is rented
			foreach($unit->personalinfo as $person)
			{
				$rentday = $person->pivot->rentday;
				//if rented, generate billing
				if( count($rentday) > 0)
				{
					if( !$this->isBilled($unitno,$currentDate) )
					{
						$rentday = Carbon::parse($rentday)->day;
						$this->generateBilling($unitno,$amount);
					}
				}
			}
		}
	}

	/*
		check if property has been billed
	*/
	public function isBilled($unitno)
	{
		$billinginfo = Billinginfo::where('unitno','=',$unitno)->get();
		foreach($billinginfo as $bill)
		{
			$start = new Carbon('first day of this month');
			$end = new Carbon('last day of this month');
			$bill_unitno = $bill->unitno;
			$bill_currentdate = $bill->billdate;
			if( ( $bill_unitno == $unitno) && ( Carbon::parse($bill_currentdate)->between($start, $end)) )
			{
				return true;
			}
		}
		return false;
	}

	/*
		generate billing based on information
	*/
	public function generateBilling($unitno,$amount)
	{
		$billinginfo = Billinginfo::create([
			'unitno' => $unitno,
			'price' => $amount,
			'duedate' => Carbon::parse(Carbon::now())->endOfMonth(),
			'billdate' => Carbon::now()->toDateTimeString()
		]);
	}

	public function scheduleMoveOut()
	{
		$moveout = Moveout::all();
		foreach($moveout as $move){
			if( Carbon::parse($move->moveoutdate) <= Carbon::now() )
			{
				if($move->status != 'done'){
					$unit = Property::where('unitno','=',$move->unitno)->first();
					$unit->status = 'lease';
					$unit->save();

					$rent = Rent::where('unitno','=',$move->unitno)->first();
					$rent->delete();

					$m = DB::table('tbl_moveout')->where('unitno','=',$move->unitno)
						->where('status','!=','done')
							->update(['status' => 'done']);

					$message = 'Scheduled moveout has arrived for tenant living in '.$move->unitno;
					Session::flash('message',$message);
				}
			}
		}
	}


}
