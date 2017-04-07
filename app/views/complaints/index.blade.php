@extends('layouts.navbar')
@section("title")
  Complaint list
@stop
@section("style")
    body{
      padding-top: 120px;
    }
@stop
@section('content')
  {{ HTML::style(asset("css/buttons.bootstrap.min.css")) }}
  <div class="container-fluid">
    <!-- table -->
    <div class="row" style="padding-bottom: 170px">
      <div class="col-md-12 table-responsive">
        <table id="tenantinfo" class="table table-hover table-striped table-condensed">
          <!-- table header -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Complainant</th>
              <th>Title</th>
              <th>Description</th>
              <th>Complaint Date</th>
              <th>Action Taken</th>
              <!-- <th>Username</th> -->
              <!-- <th>Action</th> -->
            </tr>
          </thead> <!-- end of table header -->
          <!-- table body -->
          <tbody>
            @foreach($complaints as $complaint)
            <tr>
              <td>{{ $complaint->complaintid }}</td>
              <td>{{ $complaint->personalinfo->firstname }} {{ $complaint->personalinfo->lastname }}</td>
              <td>{{ $complaint->title }}</td>
              <td>{{ $complaint->description }}</td>
              <td>{{ Carbon\Carbon::parse($complaint->complaint_date)->toFormattedDateString() }}</td>
              <td>
              @if(count($complaint->solution) > 0)
              {{ HTML::ul($complaint->solution->lists('response')) }}
              @else
              {{ Form::open(['method'=>'get','route'=>array('solution.show',$complaint->complaintid)]) }}
              {{ Form::submit('Solve',[
              'class'=>'btn btn-sm btn-danger btn-block'
              ]) }} 
              {{ Form::close() }}
              @endif
              </td>
            </tr>
            @endforeach
          </tbody> <!-- end of table body -->
        </table> <!-- end of table -->
      </div>
    </div> <!-- end of row -->
  </div> <!-- end of container-fluid -->
  {{ HTML::style( asset('js/buttons.bootstrap.min.js')) }}
  {{ HTML::style(asset("js/ dataTables.buttons.min.js")) }}
@stop
@section('modal')
  @include('modals.account.create')
@stop
@section('script')
  @if( Session::has("success-message") )
      swal("Niceee!","{{ Session::pull('success-message') }}","success");
  @endif
  @if( Session::has("error-message") )
      swal("Oops...","{{ Session::pull('error-message') }}","error");
  @endif

  $('#addnewtenant').click(function(){
    $('#modal-title').text('Add new tenant');
    $('#tenantmodal').modal('show');
  });

  $('#tenantinfo').DataTable({
    buttons: [
        'print'
    ]
} );
@stop
