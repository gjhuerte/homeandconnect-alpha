@extends('layouts.navbar')
@section('title')
  Dashboard
@stop
@section('css-link')
{{ HTML::style(asset('css/dashboard.css')) }}
@stop
@section('content')
  <div class="container-fluid" style="padding-bottom: 10px;">
    <div class="row">
      <!-- accordion -->
      <div class="col-sm-2" id="accordion" role="tablist" aria-multiselectable="true" style="margin: 0;padding: 0;border-radius: 0;border: none;">
        <!-- Notification tab -->
        <div class="panel panel-primary" style="border:none;border-radius: 0;padding:0;margin:0;">
          <div class="panel-heading" role="tab" id="headingOne">
            <div class="panel-title">
            <a role="button">
              Notification
            </a>
            </div>
          </div>
          <div id="collapseOne" >
            @foreach($billinginfo as $bill)
              @if(count($bill->payment) > 0)
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><p class="text-success">{{ (count($bill->property) > 0) ? "Unit Number: ".$bill->property->unitno : "Nothing to view" }}</p></h4>
                @if(count($bill->property->personalinfo) > 0)
                  @foreach($bill->property->personalinfo as $personalinfo)
                  <p class="list-group-item-text">{{ $personalinfo->lastname }} payed her rental on {{{ Carbon\Carbon::parse($bill->billdate)->toFormattedDateString() }}}</p>
                  @endforeach
                @endif
              </a>
              @elseif(count($bill->payment) == 0)
                @if(Carbon\Carbon::parse($bill->duedate) > Carbon\Carbon::now())
                <a href="#" class="list-group-item">
                  <h4 class="list-group-item-heading"><p class="text-success">{{ (count($bill->property) > 0) ? $bill->property->unitno : "Nothing to view" }}</p></h4>
                  @if(count($bill->property->personalinfo) > 0)
                    @foreach($bill->property->personalinfo as $personalinfo)
                    <p class="list-group-item-text">{{ $personalinfo->lastname }} payed her rental on {{{ Carbon\Carbon::parse($bill->billdate)->toFormattedDateString() }}}</p>
                    @endforeach
                  @endif
                </a>
                @else
                <a href="#" class="list-group-item">
                  <h4 class="list-group-item-heading"><p class="text-success">{{ (count($bill->property) > 0) ? $bill->property->unitno : "Nothing to view" }}</p></h4>
                  @if(count($bill->property->personalinfo) > 0)
                    @foreach($bill->property->personalinfo as $personalinfo)
                    <p class="list-group-item-text">{{ $personalinfo->lastname }} payed her rental on {{{ Carbon\Carbon::parse($bill->billdate)->toFormattedDateString() }}}</p>
                    @endforeach
                  @endif
                </a>
                @endif
              @endif
            @endforeach
          </div> <!-- end of notification tab -->
        </div>
        <!-- rental info tab -->
        <div class="panel panel-primary" style="border:none;border-radius: 0;padding:0;margin:0;">
          <div class="panel-heading" role="tab" id="headingThree">
            <div class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                Rental Information
              </a>
            </div>
          </div>
          <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
          @foreach( $rents as $rent )
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading"><p class="text-success">Unit Number: {{ $rent->unitno }}</p></h4>
              <p class="list-group-item-text">Unit Number has been rented on {{ Carbon\Carbon::parse($rent->rentday)->toFormattedDateString() }}</p>
            </a>
          @endforeach
          @foreach( $moveouts as $moveout )
            @if( Carbon\Carbon::parse($moveout->moveoutdate)->toFormattedDateString() < Carbon\Carbon::now()->toFormattedDateString() )
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading"><p class="text-warning">Unit Number: {{ $moveout->unitno }}</p></h4>
              <p class="list-group-item-text">Unit Number will be moving out on {{ Carbon\Carbon::parse($moveout->moveoutdate)->toFormattedDateString() }}</p>
            </a>
            @else
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading"><p class="text-danger">Unit Number: {{ $moveout->unitno }}</p></h4>
              <p class="list-group-item-text">Unit Number rental contract has ended on {{ Carbon\Carbon::parse($moveout->moveoutdate)->toFormattedDateString() }}</p>
            </a>
            @endif
          @endforeach
           </div>
        </div> <!-- end of rental info tab -->
        <!-- rental info tab -->
        <div class="panel panel-primary" style="border:none;border-radius: 0;padding:0;margin:0;">
          <div class="panel-heading" role="tab" id="headingFour">
            <div class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                Complaints
              </a>
            </div>
          </div>
          <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
            @foreach( $complaints as $complaint )
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"><p class="text-info">Complaint: {{ $complaint->title }}</p></h4>
                <p class="list-group-item-text">Description: {{ $complaint->description }}</p>
                @if(count($complaint->solution) > 0)
                <p class="list-group-item-text">Action Taken: {{ HTML::ul($complaint->solution->lists('response')) }}</p>
                @else
                <p class="list-group-item-text">Action Taken: None</p>
                @endif
              </a>
            @endforeach
           </div>
        </div> <!-- end of rental info tab -->
      </div>
      <div class="col-md-10">
        <h1 class="page-header">House for rent</h1>
          <div class='row'>
          @foreach( $property as $unit)
            <div class='col-sm-4'>
              <div class='panel panel-default'>
                <div class='panel-heading'>
                  <strong>Property Name: </strong>{{ $unit->unitno }}
                  @if($unit->status == 'lease')
                    <span class="label label-success">For rent</span>
                  @else
                    <span class="label label-danger">Occupied</span>
                  @endif
                </div>
                <div class='panel-body'>
                  <img src="{{ asset('img') }}" alt='Property Image' >
                </div>
                  <ul class="list-group">
                    <li class="list-group-item"><strong>Rental Price: </strong>{{ $unit->price }}</li>
                    <li class="list-group-item"><strong>Description: </strong>{{ $unit->description }}</li>
                    <li class="list-group-item"><strong>Address: </strong>{{ $unit->address }}</li>
                  </ul>
              </div>
            </div>
          @endforeach
          </div>
      </div> <!-- end of main -->
    </div>
  </div>
@stop
@section('script')
    // $(document).ready(function() {
    //   $('#tenantinfo').DataTable();
    // });
    // $(function () {
    //   $('[data-toggle="tooltip"]').tooltip()
    // });
    @if( Session::has("message") )
      swal("{{ Session::get('message') }}");
      {{ Session::forget('message') }}
    @endif
@stop
