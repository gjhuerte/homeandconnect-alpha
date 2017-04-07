@extends('layouts.navbar')
@section("title")
Property Maintenance
@stop
@section("style")
    body{
      padding-top:70px;
      background-color: #f5f5f5;
    }
@stop
@section('content')
  <div class="container-fluid">
    <div class='row'>
      <div class='col-md-offset-4 col-md-5'>   
          <!-- form -->
          {{ Form::open(array('route'=>'maintenance.property.store')) }}
          {{ Form::token() }}
            <div class="panel panel-primary">
              <!-- header -->
              <div class="panel-heading">
                Property Information
              </div><!-- end of header -->
              <!-- body -->
              <div class="panel-body">
               <div class='form-group col-md-6'>
                  {{ Form::label('unitno','Unit Number') }}
                  {{ Form::text('unitno',null,array(
                      'required',
                      'class'=>'form-control',
                      'placeholder'=>'Enter unit number here...',
                      'id'=>'unitno')) }}
                </div> <!-- end of house information --> 
                <div class='form-group col-md-6'>
                {{ Form::label('price','Rental Amount') }}
                {{ Form::text('price',null,array(
                    'required',
                    'class'=>'form-control',
                    'placeholder'=>'Enter amount here...',
                    'id'=>'amount')) }}
                </div> <!-- end of rent amount --> 
                <div class='form-group'>
                  {{ Form::label('address','House Address') }}
                  {{ Form::textarea('address',null,array(
                      'required',
                      'class'=>'form-control',
                      'rows'=>'6',
                      'placeholder'=>'Enter address here...')) }}
                </div> <!-- end of address --> 
                <div class='form-group'>
                  {{ Form::label('description','House Description') }}
                  {{ Form::textarea('description',null,array(
                      'required',
                      'class'=>'form-control',
                      'rows'=>'6',
                      'placeholder'=>'Enter description here...')) }}
                </div> <!-- end of house information --> 
                  {{ Form::submit('Create',array(
                      'class'=>'pull-right btn btn-primary')) }}
              </div> <!-- end of body -->
            </div>
          {{ Form::close() }}
        </div> <!-- end of panel-body -->
      </div> <!-- end of col-md-12 -->
    </div> <!-- end of row -->
  </div> <!-- end of container fluid -->
@stop