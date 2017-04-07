@extends("layouts.navbar")
@section("title")
  Advance Payment
@stop
@section("style")
  body{
    padding-top: 100px;
    background-color: #f5f5f5;
  }
@stop
@section('content')
    <!-- topmost container -->
    <div class=container-fluid>
      <!-- divide the page into two -->
      <div class=row>
        <!-- payment form -->
        <div class="col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4 ">
          <div class="panel panel-shadow panel-success">
            <!-- panel header -->
            <div class="panel-heading">
              <h1 class="payment-text">Advance Payment</h1>
            </div> <!-- end of panel header -->
            <!-- panel body -->
            <div class="panel-body">
                {{ Form::open(['class'=>'form-horizontal']) }}
                <!-- unitnumber -->
                <div class='form-group'>
                  <div class='col-md-12'>
                    <div class="col-md-6">
                      <label for='unitno' class='control-label'>Unit Number:</label>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control" id="unitno" name="unitno">
                        @foreach($property as $unit)
                        <option value='{{ $unit->unitno }}'>{{ $unit->unitno }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div><!-- end of unitnumber -->
                <div class="form-group">
                  <div class='col-md-12'>
                    <div class="col-sm-6">
                      <label for="months">Number of Months:</label>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" id="months" name="months">
                      @for( $ctr = 1; $ctr < 13; $ctr++)
                        <option value='{{ $ctr}}'>{{ $ctr }}</option>
                      @endfor
                      </select>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='col-md-12'>
                    <div class="col-sm-6">
                      <label for="monthsamount">Amount to pay:</label>
                    </div>
                    <div class="col-sm-6">
                      <p class="form-control" id="totalpayment"></p><input type="hidden" class="form-control" id='totalpayment' value="0" readonly>
                      <input type='hidden' name='amount' id='amount'>
                    </div>
                  </div>
                </div>
                <!-- pay button -->
                <div class='form-group'>
                  <div class='col-md-12'>
                    <div class="col-md-offset-8 col-md-4">
                      <button type='submit' class='btn btn-block btn-success' name='pay'>Pay</button>
                    </div>
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
  
  @if( Session::has("success-message") )
      swal("Niceee!","{{ Session::pull('success-message') }}","success");
  @endif
  @if( Session::has("error-message") )
      swal("Oops...","{{ Session::pull('error-message') }}","error");
  @endif
  
  $('#unitno,#months').change(function(){
    var unitno = $('#unitno').val();
    var months = $('#months').val();
    $.ajax({
      type: 'post',
      url: '{{ url('/findHousePrice') }}',
      data: {'unitno' : unitno}, 
      dataType: 'json',
      success: function(response){ 
        $('#totalpayment').val(response.price*months).text(response.price*months);
        $('#amount').val(response.price*months).text(response.price*months);
      },
      error: function(response){
        console.log(response.responseJSON);
      }
     });
  });
  $(document).ready(function(){
    var unitno = $('#unitno').val();
    var months = $('#months').val();
    $.ajax({
      type: 'post',
      url: '{{ url('/findHousePrice') }}',
      data: {'unitno' : unitno}, 
      dataType: 'json',
      success: function(response){ 
        $('#totalpayment').val(response.price*months).text(response.price*months);
        $('#amount').val(response.price*months).text(response.price*months);
      },
      error: function(response){
        console.log(response.responseJSON);
      }
     });
  });

@stop