@extends('layouts.navbar')
@section("title")
  Settings
@stop
@section('style')
  body{
    padding-top: 70px;
  }
@stop
@section('content')
  <!-- body -->
  <div class="container-fluid"">
    <div class="row">
      <div class="col-md-offset-4 col-md-4">
        <!-- panel body -->
        <div class="panel panel-primary">
          <!-- panel-head -->
          <div class="panel-heading">
            Profile
          </div><!-- end of panel head -->
          <!-- panel-body -->
          <div class="panel-body">
            {{ Form::open(array('class'=>'form-horizontal','id'=>'tenantForm')) }}
                <div class="form-group">
                  <div class="col-sm-12">
                  {{ Form::label('Username') }}
                  </div>
                  <div class="col-sm-12">
                    {{ Form::text('username',null,
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
                    {{ Form::text('lastname',null,
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
                    {{ Form::text('firstname',null,
                        array('class'=>'form-control',
                        'placeholder'=>'Firstname')) }}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                  {{ Form::label('Middle name') }}
                  </div>
                  <div class="col-sm-12">
                    {{ Form::text('middlename',null,
                        array('class'=>'form-control',
                        'placeholder'=>'Middlename'))}}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                  {{ Form::label('Birth date') }}
                  </div>
                  <div class="col-sm-12">
                    {{ Form::text('birthdate',null,
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
                    {{ Form::email('email',null,
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
                    {{ Form::text('cellno',null,
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
                    {{ Form::submit('Submit',
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
@section('script')
    $(function() {
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        maxAge: 59,
        minAge: 15
      });
    });

    $("#clear").click(function(){
      $("#tenantForm").trigger("reset");
    });
@stop