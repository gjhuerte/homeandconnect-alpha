@extends("layouts.nav.main.inverse")
@section('title')
Login
@stop
@section('style')
  body{
    background-color: #f5f5f5;
    padding-top: 150px;
  }
  .navbar-inverse{
    background-color: #2f2f2f;
    border:none;
  }
@stop
@section('content')
  <!-- body -->
  <div class="container-fluid" style="margin-bottom:100px;">
    <div class="row">
      <div class="col-md-push-4 col-md-4">
        <!-- panel body -->
        <div class="panel panel-shadow panel-padding"> 
          <!-- panel-body -->
          <div class="panel-body">      
             @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul style='margin-left: 10px;'>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(array('class'=>'form-horizontal')) }}
              {{ Form::token() }}
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('text','Username') }}
                </div>
                <div class="col-sm-12">
                {{ Form::text('username',Input::old('username'),
                    array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Enter username here',
                      '')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('password','Password') }}
                </div>
                <div class="col-sm-12">
                {{ Form::password('password',
                  array('required',
                    'class'=>'form-control',
                    'placeholder'=>'Enter password here')) }}
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-6">
                  {{ Form::button('Forgot Password?',
                      array('class'=>'btn btn-link push-left')) }}
                  </div>
                  <div class="col-sm-offset-2 col-sm-4">
                  {{ Form::submit('Login',
                      array('class'=>'btn btn-primary btn-block pull-right')) }}
                  </div>
            </div>
            {{ Form::close() }}
          </div><!-- end of panel-body -->
        </div><!-- end of panel -->
      </div> <!-- end of col -->
    </div> <!-- end of row -->
  </div><!-- end of container fluid-->
@stop
@section("script")
  @if( Session::has("success-message") )
      swal("Niceee!","{{ Session::pull('success-message') }}","success");
  @endif
  @if( Session::has("error-message") )
      swal("Oops...","{{ Session::pull('error-message') }}","error");
  @endif
@stop
