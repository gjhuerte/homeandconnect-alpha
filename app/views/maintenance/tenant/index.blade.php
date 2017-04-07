@extends('layouts.navbar')
@section("title")
  Tenant Maintenance
@stop
@section("style")
    body{
      padding-top: 70px;
    }
@stop
@section('content')
  {{ HTML::style(asset("css/buttons.bootstrap.min.css")) }}
  <div class="container-fluid" style='margin-bottom: 250px;'>    
    <!-- add new tenant -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-4" style="margin-bottom: 10px;">
        {{ Form::open() }}
          {{ Form::token() }}
          {{ Form::button('Add new tenant',array(
              'class'=>'btn btn-success btn-md',
              'name'=>'addnewtenant',
              'id'=>'addnewtenant')) }}
        {{ Form::close() }}
      </div>
    </div><!-- end of upper body -->
    <!-- table -->
    <div class="row">
      <div class="col-md-12 table-responsive">
        <table id="tenantinfo" class="table table-hover table-striped">
          <!-- table header -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Lastname</th>
              <th>Firstname</th>
              <th>Middlename</th>
              <th>Birthdate</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Gender</th>
              <th>Action</th>
              <!-- <th>Username</th> -->
              <!-- <th>Action</th> -->
            </tr>
          </thead> <!-- end of table header -->
          <!-- table body -->
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{ $user->personalid }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->middlename }}</td>
                <td>{{ $user->birthdate }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->cellno }}</td>
                <td>{{ $user->gender }}</td>
                <td>
                  {{ Form::open(['method'=>'GET','route'=>['maintenance.tenant.edit',$user->personalid]]) }}
                  <button type='submit' class='btn btn-warning col-sm-5' id='update'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>

                  {{ Form::open(['method'=>'DELETE','route'=>['maintenance.tenant.destroy',$user->personalid]]) }}
                    <button type='submit' class='btn btn-danger col-sm-offset-1 col-sm-5' id='update'><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  {{ Form::close() }}
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
  @if( Session::has("message") )
      swal("{{ Session::get('message') }}");
    {{ Session::forget('message') }}
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
