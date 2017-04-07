@extends('layouts.navbar')
@section('title')
  {{ $title }}
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
            {{ Form::open(array('class'=>'form-horizontal','id'=>'signupForm')) }}
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Username') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::text('username',Input::old('username'),
                      array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Username')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  {{ Form::label('Password') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::password('password',
                      array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Password')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Verify Password') }}
              </div>
                <div class="col-sm-12">
                  {{ Form::password('verify',
                      $attributes = array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Verify Password')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Last name') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::text('lastname',Input::old('lastname'),
                      array('required',
                        'class'=>'form-control',
                        'placeholder'=>'Lastname')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('First name') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::text('firstname',Input::old('firstname'),
                      array('class'=>'form-control',
                      'placeholder'=>'Firstname')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Middle name') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::text('middlename',Input::old('middlename'),
                      array('class'=>'form-control',
                      'placeholder'=>'Middlename'))}}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Birth date') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::text('birthdate',Input::old('birthdate'),
                    array('id'=>'datepicker',
                    'class'=>'form-control',
                    'placeholder'=>'Month / Day / Year')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Email Address') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::email('email',Input::old('email'),
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'Email Address')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Cellphone Number') }}
                </div>
                <div class="col-sm-12">
                  {{ Form::text('cellno',Input::old('cellno'),
                    array('class'=>'form-control',
                    'placeholder'=>'Cellphone Number')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                {{ Form::label('Gender') }}
                </div>
                <label class="checkbox-inline">
                  {{ Form::radio('gender','M',true) }}
                  Male
                </label>
                <label class="checkbox-inline">
                  {{ Form::radio('gender','F') }}
                  Female
                </label>
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
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      maxAge: 59,
      minAge: 15
    });
  });

  $("#clear").click(function(){
    $("#signupForm").trigger("reset");
  });
@stop
