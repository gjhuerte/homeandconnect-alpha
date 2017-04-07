@extends('layouts.navbar')
@section("title")
Property Maintenance
@stop
@section("style")
    body{
      padding-top:70px;
    }
@stop
@section('content')
  {{ HTML::style(asset("css/buttons.bootstrap.min.css")) }}
  <div class="container-fluid" style='margin-bottom: 250px;'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='panel-body'>
          <div class='form-group'>
          {{ Form::open(['method'=>'GET','route'=>'maintenance.property.create']) }}
            {{ Form::token() }}
            {{ Form::submit('Add new property',array(
                'class'=>'btn btn-success btn-md',
                'name'=>'addnewproperty',
                'id'=>'addnewproperty')) }}
          {{ Form::close() }}
          </div><!-- end of form-group -->
        </div> <!-- end of panel-body -->
      </div> <!-- end of col-md-12 -->
      <div class="col-md-12 table-responsive">
        <table id="propertyinfo" class="table table-hover table-striped">
          <thead>
            <th>Property Name</th>
            <th>Rent price</th>
            <th>Address</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
          </thead>
          <tbody>
            @if(!empty($property))
              @foreach( $property as $unit )
                <tr>
                  <td>{{ $unit->unitno }}</td>
                  <td>{{ $unit->price }}</td>
                  <td>{{ $unit->description}} </td>
                  <td>{{ $unit->address }}</td>
                  <td>{{ $unit->status }}</td>
                  <td>
                    {{ Form::open(['method'=>'GET','route'=>['maintenance.property.edit',$unit->unitno]]) }}
                    {{ Form::token() }}
                    {{ Form::submit('Update',array(
                            'class'=>'btn btn-warning col-sm-5',
                            'id'=>'update')) }}
                    {{ Form::close() }}

                    {{ Form::open(['method'=>'DELETE','route'=>['maintenance.property.destroy',$unit->unitno]]) }}
                    {{ Form::token() }}
                      {{ Form::submit('Delete',array(
                            'name'=>'delete',
                            'class'=>'btn btn-danger col-sm-offset-1 col-sm-5',
                            'id'=>'delete')) }}
                    {{ Form::close() }}
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div> <!-- end of table -->
    </div> <!-- end of row -->
  </div> <!-- end of container fluid -->
  {{ HTML::script( asset('js/buttons.bootstrap.min.js')) }}
  {{ HTML::script(asset("js/dataTables.buttons.min.js")) }}
@stop
@section('script')
  @if( Session::has("success-message") )
      swal("{{ Session::pull('success-message') }}","","success");
  @endif
  @if( Session::has("error-message") )
      swal("Oops...","{{ Session::pull('error-message') }}","error");
  @endif
  $('#propertyinfo').DataTable({
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
@stop
