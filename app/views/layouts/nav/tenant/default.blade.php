@section('header')
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Home and Connect</a>
    </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li>{{ HTML::link('dashboard','Home') }}</li>
      <li>{{ HTML::link('complaints/create','Complaints') }}</li>
      <li class="dropdown">
        <a href=# class=dropdown-toggle data-toggle=dropdown role=button aria-haspopup=true aria-expanded=false>
          @foreach( User::where('username','=',Auth::user()->username)->get() as $user)
            @if(count($user->personalinfo) > 0)
            {{ $user->personalinfo->firstname }} {{ $user->personalinfo->lastname }} 
            @endif
          @endforeach
        <span class=caret></span></a>
          <ul class="dropdown-menu">
            <li>{{ link_to('settings','Settings') }}</li>
            <li role="separator" class="divider"></li>
            <li>{{ link_to('logout','Logout') }}</li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!-- end of navigation bar -->
@stop