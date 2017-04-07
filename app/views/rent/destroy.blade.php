@extends('layouts.navbar')
@section("title")
Move out
@stop
@section("style")
  body{
    padding-top: 80px;
  }
@stop
@section('content')
   <!-- topmost container -->
    <div class=container-fluid style='padding-bottom: 200px; margin: 10px;'>
      <!-- divide the page into two -->
      <div class="row table-responsive">
        <table id='tenantinfo' class="table table-hover table-striped">
          <thead>
            <th>Unit Name</th>
            <th>Description</th>
            <th>Leasor</th>
            <th>Date Lease</th>
            <th class=text-center>Scheduled Moveout</th>
            <th>Action</th>
          </thead>
          <tbody>
            @foreach($property as $unit)
            <tr>
              <td>{{ $unit->unitno }}</td>
              <td>{{ $unit->description }}</td>
              @if(count($unit->personalinfo) > 0)
                @foreach($unit->personalinfo as $person)
                <td>{{ $person->lastname.", ".$person->firstname." ".$person->middlename }}</td>
                @endforeach
              @else
              <td>None</td>
              @endif
              <td>
                @if(count($unit->personalinfo) > 0)
                  @foreach($unit->personalinfo as $person)
                  {{ Carbon\Carbon::parse($person->pivot->rentday)->toFormattedDateString() }}
                  @endforeach
                @else
                  None
                @endif
              </td>
              @if(count($unit->personalinfo) > 0)
                {{ Form::open() }}
                <td class=text-center>                
                  {{ Form::text('moveoutdate',(count($unit->moveout) > 0) ? Carbon\Carbon::parse($unit->moveout->moveoutdate)->toFormattedDateString() : "",[
                      'class'=>'form-control datepicker',
                      'placeholder'=>'Month / Day / Year',
                      'readonly'
                    ]) }}
                </td>              
                <td>               
                  <input type='hidden' name='unitno' value='{{ $unit->unitno }}'> 
                  {{ Form::submit('Schedule',array(
                      'class'=>'btn btn-block btn-danger')) }}
                </td>
                  @foreach($unit->personalinfo as $person)
                  <input type='hidden' name='rentday' value='{{ $person->pivot->rentday }}' />
                  @endforeach
                {{ Form::close() }}
              @else
                <td class='text-center'> --- </td>
                <td class='text-center'> --- </td>  
              @endif

            </tr>
            @endforeach
          </tbody>
        </table>
      </div> <!-- end of row -->
    </div> <!-- end of container-fluid -->
@stop
@section('script')

  @if( Session::has("success-message") )
      swal("{{ Session::pull('success-message') }}","","success");
  @endif
  @if( Session::has("error-message") )
      swal("Oops...","{{ Session::pull('error-message') }}","error");
  @endif

  $('#tenantinfo').DataTable();
 
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      maxAge: 59,
      minAge: 15
    });
  });
@stop
