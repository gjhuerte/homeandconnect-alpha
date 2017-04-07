@extends('layouts.master')
@if( Auth::check() )
	@if( Auth::user()->access_level == 0 )
		@include('layouts.nav.admin.inverse')
	@else
		@include('layouts.nav.tenant.default')
	@endif
@else
	@include('layouts.nav.main.default')
@endif