<?php

class UserTableSeeder extends Seeder{
	public function run()
	{
		DB::table('tbl_user')->delete();
		$personalinfo = Personalinfo::create([
			'lastname' => 'Doe',
			'firstname' => 'John',
			'middlename' => 'Juan',
			'cellno' => '09123456789',
			'email' => 'admin@email',
			'birthdate' => Carbon\Carbon::parse('01/01/1990'),
			'gender' => 'M'
		]);
		$user = new User([
				'username' => 'admin',
				'password' => Hash::make('123456'),
				'access_level' => '0',
		]);	
		$personalinfo->user()->save($user);
	}
}