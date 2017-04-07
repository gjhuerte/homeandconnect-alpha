@extends('layouts.navbar')
@section("title")
  Settings
@stop
@section('style')
  body{
    padding-top: 70px;
    background-color: #f5f5f5;
  }
@stop
@section('content')
  <!-- body -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-offset-4 col-md-4">
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
        <div class="panel panel-primary">
          <!-- panel-head -->
          <div class="panel-heading">
            Profile
          </div><!-- end of panel head -->
          <!-- panel-body -->
          <div class="panel-body">
                  {{ Form::model($personalinfo,array('route'=>array('account.update',$personalinfo->personalid),'method'=>'PUT')) }}
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
                  {{ Form::label('Birthdate') }}
                  </div>
                  <div class="col-sm-12">
                    {{ Form::text('birthdate',Input::old('birthdate'),
                      array('id'=>'birthdate',
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
      </div>
    </div>
@stop
@section('script')
    $(function() {
      $( "#birthdate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        maxAge: 59,
        minAge: 15
      });
    });

    @if( Session::has("message") )
      swal("{{ Session::get('message') }}");
      {{ Session::forget('message') }}
    @endif
@stop
