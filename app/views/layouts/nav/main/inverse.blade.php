@extends('layouts.master')
@section('header')
<!-- navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="border:none;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img alt="Brand" class="img-responsive" src="img/icon/homeandconnect.png"></a><p class="navbar-text" style="color:white;">Home and Connect</p></a>
    </div>
    <!-- items to toggle for mobile responsive  -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>{{ link_to('/','Home') }}</li>
        <li>{{ link_to('login','Login') }}</li>
        <li class="">{{ link_to('signup','Signup') }}</li>
      </ul>
    </div><!-- end of items -->
  </div><!-- /.container-fluid -->
</nav><!-- end of navbar -->
@stop
