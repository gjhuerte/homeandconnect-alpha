<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
 use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tbl_user';
		protected $dates = ['deleted_at'];
	protected $primaryKey = 'userid';
	public $timestamps = true;
	public $fillable = [
		'username',
		'password',
		'access_level'
	];
	const CREATED_AT = "datecreated";
	const UPDATED_AT = null;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token'
	];

	public static $rules = [
		'username' => 'required|between:4,254|unique:tbl_user,username',
		'password' => 'required|min:4'
	];

	public function getRememberToken()
	{
		return null; // not supported
	}

	public function setRememberToken($value)
	{
		// not supported
	}

	public function getRememberTokenName()
	{
		return null; // not supported
	}

	/**
	* Overrides the method to ignore the remember token.
	*/
	public function setAttribute($key, $value)
	{
		$isRememberTokenAttribute = $key == $this->getRememberTokenName();
		if (!$isRememberTokenAttribute)
		{
		 parent::setAttribute($key, $value);
		}
	}

	public static function getAccessLevel($value)
	{
		return User::select('access_level')->where('username', $value)->first();
	}

	public function personalinfo()
	{
		return $this->belongsTo('Personalinfo','userid','personalid');
	}

	public function login()
	{
		return $this->hasMany('Login','username','username');
	}

	public function logout()
	{
		return $this->hasMany('Logout','username','username');
	}

}
