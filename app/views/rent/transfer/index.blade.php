@extends('layouts.navbar')
@section("title")
Transfer
@stop
@section("style")
  body{
    padding-top: 140px;
    background-color: #f5f5f5;
  }

  .panel{
    margin-bottom: 80px;
  }
@stop
@section('content')
  <!-- topmost container -->
  <div class=container-fluid>
    <!-- divide the page into two -->
    <div class=row>
      <!-- payment form -->
      <div class="col-sm-offset-4 col-sm-4"> 

        @if( Session::has("success-message") )
            <div class="alert alert-successalert-dismissible" role="alert">{{ Session::get('success-message') }}</div>
        @endif
        @if( Session::has("error-message") )
            <div class="alert alert-danger alert-dismissible" role="alert">{{ Session::get('error-message') }}</div>
        @endif
        <div class="panel panel-shadow panel-padding">
          <!-- panel body -->
          <div class="panel-body">
              {{ Form::open(['class'=>'form-horizontal']) }}
              <!-- unitnumber -->
              <div class='form-group'>
                <div class="col-md-12">
                  <label for='unitno' class='control-label'>Unit Number:</label>
                </div>
                <div class="col-md-12">
                    <select class="form-control" id="unitno" name="unitno">
                      @foreach( $property as $unit ) 
                      <option value="{{ $unit->unitno }}">{{ $unit->unitno }}</option>
                      @endforeach
                    </select>
                  </div>
              </div><!-- end of unitnumber -->
              <!-- unitnumber -->
              <div class='form-group'>
                <div class="col-md-12">
                  <label for='transferto' class='control-label'>Transfer to:</label>
                </div>
                <div class="col-md-12">
                    <select class="form-control transferto" id="transferto" name="transferto">
                      <option></option>
                    </select>
                </div>
              </div><!-- end of unitnumber -->
              <!-- pay button -->
              <div class='form-group'>
                <div class="col-md-offset-8 col-md-4">
                  <button type='submit' class='btn btn-block btn-primary' name='transfer' id='transfer'>Transfer</button>
                </div>
              </div><!-- end of pay button -->
              {{ Form::close() }}
          </div> <!-- end of panel-body -->
        </div> <!-- end of panel success -->
      </div> <!-- end of payment form -->
    </div> <!-- end of row -->
  </div> <!-- end of container-fluid -->
@stop
@section('script')
  $('#unitno,#months').change(function(){
    dynamicChange();
  });

  $(document).ready(function(){
    dynamicChange();
  });

  function dynamicChange(){
    var unitno = $('#unitno').val();
    $.ajax({
      type: 'post',
      url: '{{ url('/findUnusedHouse') }}',
      data: {'unitno' : unitno}, 
      dataType: 'json',
      beforeSend: function(){
        swal({
          title: "Generating property list..",
          timer: 500,
          showConfirmButton: false
        });
      },
      success: function(response){ 
        options = "";
        for(var ctr = 0;ctr<response.length;ctr++){
          options += "<option value="+response[ctr].unitno+">"+response[ctr].unitno+"</option>";
        }   
        $('.transferto').html(" ");
        $('.transferto').append(options);
      },
      error: function(response){
        console.log(response.responseJSON);
      }
     });
  }
@stop