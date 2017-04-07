@extends('layouts.navbar')
@section("title")
  Rental Payment
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
    <div class=row style="margin-bottom: 200px;">
      <!-- payment form -->
      <div class="col-sm-offset-4 col-sm-4">
        <div class="panel panel-primary panel-shadow">
          <div class="panel-heading">
            Billing ID
          </div>
          <div class="panel-body">
            <div class="form-group">
                <table class="table table-responsive">
                  <thead>
                    <th>Billing ID</th>
                    <th>Unit Number</th>
                    <th>Balance</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                  @if(count($billinginfo) > 0)
                    @foreach($billinginfo as $bill)
                      <tr>
                        <td>{{ $bill->billinginfoid }}</td>
                        <td>{{ $bill->unitno }}</td>
                        <td>{{ $bill->price }}</td>
                        <td>
                        {{ Form::open(['method'=>'post','route'=>'payment.rental.store']) }}
                          <input type="hidden" value="{{ $bill->billinginfoid }}" name="billinginfo">
                          {{ Form::submit('Pay',array(
                            'class'=>'btn btn-info btn-block',
                            'name'=>'pay')) }}
                        {{ Form::close() }}
                        </td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
            </div>
          </div>
        </div>
    </div> <!-- end of row -->
  </div> <!-- end of container-fluid -->
@stop
@section("script")
  @if( Session::has("success-message") )
      swal("Niceee!","{{ Session::pull('success-message') }}","success");
  @endif
  @if( Session::has("error-message") )
      swal("Oops...","{{ Session::pull('error-message') }}","error");
  @endif
@stop
