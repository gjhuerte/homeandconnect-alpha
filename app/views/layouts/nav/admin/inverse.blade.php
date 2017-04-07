@section('style')
  [data-notify="progressbar"] {
    margin-bottom: 0px;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 5px;
  }

  .navbar > a{
    color: white;
  }
@stop
@section('header')
  <!-- navigation bar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <!-- container inside navbar -->
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <!-- mobile responsive icon -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- icon and header name -->
        <a class="navbar-brand" href="#">Home and Connect</a>
      </div> <!-- end of mobile responsive icon -->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <!-- left navbar -->
        <ul class="nav navbar-nav">
          <!-- home tab -->
          <li>{{ HTML::link('dashboard','Home') }}</li>
          <!-- lease option dropdown tab -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rental <span class="caret"></span></a>
            <!-- dropdown items -->
            <ul class="dropdown-menu">
              <!-- lease tab -->
              <li>{{ HTML::link('property/lease','Lease') }}</li>
              <!-- transfer tab -->
              <li>{{ HTML::link('property/transfer','Transfer') }}</li>
              <!-- remove tab -->
              <li>{{ HTML::link('property/moveout','Move out') }}</li>
            </ul> <!-- end of dropdown items -->
          </li> <!-- end of lease option dropdown tab -->
          <!-- payment dropdown tab -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payment <span class="caret"></span></a>
            <!-- dropdown items -->
            <ul class="dropdown-menu">
              <!-- rentalpayment tab -->
              <li>{{ HTML::link('payment/rental','Rental') }}</li>
              <!-- advancepayment tab -->
              <li>{{ HTML::link('payment/advance','Advance') }}</li>
            </ul> <!-- end of dropdown items -->
          </li> <!-- end of payment dropdown tab -->
          <li>{{ HTML::link('complaints','Complaints') }}</li>
          <!-- maintenance dropdown tab -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenance <span class="caret"></span></a>
            <!-- dropdown items -->
            <ul class="dropdown-menu">
              <!-- tenant maintenance tab -->
              <li>{{ HTML::link('maintenance/tenant','Tenant') }}</li>
              <!-- property maintenance tab -->
              <li>{{ HTML::link('maintenance/property','Property') }}</li>
            </ul> <!-- end of dropdown items -->
          </li> <!-- end of maintenance dropdown tab -->
        </ul> <!-- end of left navbar -->
        <!-- right navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- dropdown name -->
          <li class="dropdown">
            <!-- display name -->
            <a href=# class=dropdown-toggle data-toggle=dropdown role=button aria-haspopup=true aria-expanded=false>
          @foreach( User::where('username','=',Auth::user()->username)->get() as $user)
            @if(count($user->personalinfo) > 0)
            {{ $user->personalinfo->firstname }} {{ $user->personalinfo->lastname }} 
            @endif
          @endforeach
              <span class=caret></span></a>
              <!-- dropdown list -->
              <ul class="dropdown-menu">
                <li>{{ HTML::link('settings','Settings') }}</li>
                <li role="separator" class="divider"></li>
                <li>{{ HTML::link('logout','Logout') }}</li>
              </ul> <!-- end of dropdown list -->
            </li> <!-- end of dropdown name -->
          </ul> <!-- end of right navbar -->
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav><!-- end of navigation bar -->
@stop