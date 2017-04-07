@extends("layouts.navbar")
@section('title')
  Home and Connect
@stop
@section('style')
  body{
    padding-top: 50px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    background-color: white;
  }
  .carousel.slide{
      max-width: 1600px;
      min-width: 900px;
      overflow: hidden;
  }
  .carousel-inner{
     width: 1600px;
     left: 59%;
     margin-left: -800px;
  }
@stop
@section('content')
  <!-- carousel -->
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol> <!-- end of indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <!-- header 1 -->
      <div class="item active">
        <!-- header image 1 -->
        <img class="img-responsive" src="{{ asset('img/header/index_1.jpg') }}" alt="...">
      </div> <!-- end of header 1 -->
      <!-- header 2 -->
      <div class="item">
        <!-- header image 2 -->
        <img src="{{ asset('img/header/index_2.jpg') }}" alt="...">
      </div> <!-- end of header 2  -->
      <!-- header 3 -->
      <div class="item">
        <!-- header image 3 -->
        <img src="{{ asset('img/header/index_3.jpg') }}" alt="...">
      </div> <!-- end of header 3  -->
    </div> <!-- end of wrapper -->
  </div><!-- end of carousel -->
  <!-- description -->
  <div class="container" style="margin-top:20px;margin-bottom:20px;padding:10px;">
    <div class="page-header" style="margin:10px;color:green;">
      <h1>Home and Connect <small>a house rental system</small></h1>
    </div>
    <!-- notification icon -->
    <div class="media" style="margin-top:20px;margin-bottom:20px;padding:10px;">
      <div class="media-left">
        <a href="#">
          <img class="media-object" src="{{ asset('img/icon/png/bell-ring.png') }}" alt="notificatin icon">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">Notification</h4>
        Billing notification are provided for both tenant and house owner
      </div>
    </div><!-- end of notification -->
    <!-- account -->
    <div class="media" style="margin-top:20px;margin-bottom:20px;padding:10px;">
      <div class="media-left">
        <a href="#">
          <img class="media-object" src="{{ asset('img/icon/png/account.png') }}" alt="account icon">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">Accounts</h4>
        Tenants can create their account to view their billing and rental information
      </div>
    </div><!-- end of account -->
    <!-- billing -->
    <div class="media" style="margin-top:20px;margin-bottom:20px;padding:10px;">
      <div class="media-left">
        <a href="#">
          <img class="media-object" src="{{ asset('img/icon/png/receipt.png') }}" alt="billing icon">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">Billing</h4>
        Billing and payment records made easy!
      </div>
    </div><!-- end of billing -->
    <!-- advertisement -->
    <div class="media" style="margin-top:20px;margin-bottom:20px;padding:10px;">
      <div class="media-left">
        <a href="#">
          <img class="media-object" src="{{ asset('img/icon/png/megaphone.png') }}" alt="description icon">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">Description and advertisement</h4>
        For our future updates, we will give access for you to advertise your house for lease
      </div><!-- end of advertisement -->
    </div><!-- end of container -->
    <!-- house image -->
    <div class="container">
      <div class="row">
        <!-- header -->
        <div class="page-header" style="margin:10px;">
          <h1 style="color:red;">For house owner!</h1>
          <small> You can add images for different parts or your house. Description and address are also provided to give your tenants information about your house </small>
        </div><!-- end of header -->
        <div class="col-md-3 col-sm-3 col-xs-3">
          <img src="{{ asset('img/description/livingroom.jpg') }}" class="img-responsive" alt="living room description">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <img src="{{ asset('img/description/kitchen.jpg') }}" class="img-responsive" alt="kitchen room description">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <img src="{{ asset('img/description/bathroom.jpg') }}" class="img-responsive" alt="bathroom room description">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <img src="{{ asset('img/description/main.jpg') }}" class="img-responsive" alt="main room description">
        </div>
      </div>
    </div><!--  -->
  </div><!-- end of house image -->
@stop
