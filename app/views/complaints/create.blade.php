@extends('layouts.navbar')
@section('title')
  Create
@stop
@section('style')
  body{
    background-color: #f5f5f5;
    padding-top: 90px;
  }

  .navbar-inverse{
    background-color: #2f2f2f;
    border:none;
  }

  .form-horizontal{
    padding: 10px;
  }

  .panel{
    box-shadow: 0.5px 0.5px 0.5px #888888;
    border-style: none;
  }
@stop
@section('content')
  <!-- body -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-push-3 col-md-6">
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
        <!-- panel body -->
        <div class="panel panel-shadow panel-padding">
          <!-- panel-body -->
          <div class="panel-body" style="padding-bottom:10px;padding-top:10px;padding-left:20px;padding-right:20px;">
            {{ Form::open(['class'=>'form-horizontal','id'=>'signupForm','method'=>'post','route'=>'complaints.store']) }}
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Property Number') }}
                </div>
                <div class="col-sm-12"> 
                {{ Form::select('unitno',$property,Input::old('unitno'),[
                  'class' => 'form-control'
                 ]) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Title') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::text('title',Input::old('title'),
                      array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Complaint title')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  {{ Form::label('Description') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::textarea('description',Input::old('description'),
                      array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Complaint Description')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                  {{ Form::submit('Create',
                    array('class'=>'pull-right btn btn-primary btn-block')) }}
                </div>
                <div class="col-sm-4">
                  {{ Form::button('Clear',
                    array('class'=>'pull-right btn btn-danger btn-block',
                    'id'=>'clear')) }}
                </div>
              </div>
              {{ Form::close() }}
            </div> <!-- end of panel body -->
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

  $("#clear").click(function(){
    $("#signupForm").trigger("reset");
  });
@stop

