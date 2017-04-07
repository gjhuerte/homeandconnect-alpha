@extends('layouts.navbar')
@section("title")
Lease
@stop
@section("style")
  body{
    padding-top: 80px;
  }
@stop
@section('content')
  @include('modals.rent.index')
   <!-- topmost container -->
    <div class=container-fluid style='padding-bottom: 200px; margin: 10px;'>
      <!-- divide the page into two -->
      <div class="row table-responsive">
        <table id='tenantinfo' class="table table-hover table-striped">
          <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Rented Property</th>
            <th>Action</th>
          </thead>
          <tbody>
            @foreach($personalinfo as $person)
            <tr>
              <td>{{ $person->personalid }}</td>
              <td>{{ $person->lastname.", ".$person->firstname." ".$person->middlename }}</td>
              <td>
                @foreach( $person->property as $perprop )
                <ul>
                {{ $perprop->unitno }}
                <ul>  
                @endforeach
              </td>
              <td>
                <button type='button' class='btn btn-block btn-primary' id='selectbutton' data-toggle='modal' data-target='#rentModal' data-info='{{ $person->personalid }}'>Select</button>
              </td>
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
  $('#selectbutton').click(function(){
    $('#rentModal').on('show.bs.modal', function (event) {
      $('#rentForm').trigger('reset');
      var button = $(event.relatedTarget) 
      var recipient = button.data('info')
      var modal = $(this)
      modal.find('.tenant-number').text(recipient).val(recipient)
      modal.find('#tenantno').text(recipient).val(recipient)

      var unitno = $('#unitno').val();
      $.ajax({
        type: 'post',
        url: '{{ url('/findHousePrice') }}',
        data: {'unitno' : unitno}, 
        dataType: 'json',
        success: function(response){ 
          $('#_amount').val(response.price).text(response.price);
          $('#amount').val(response.price).text(response.price);
        },
        error: function(response){
          console.log(response.responseJSON);
        }
       });
    });
  });

  $('#unitno').change(function(){
    var unitno = $('#unitno').val();
    $.ajax({
      type: 'post',
      url: '{{ url('/findHousePrice') }}',
      data: {'unitno' : unitno}, 
      dataType: 'json',
      beforeSend: function(){
        swal({
          title: "Generating amount..",
          timer: 2000,
          showConfirmButton: false
        });
      },
      success: function(response){ 
        $('#_amount').val(response.price).text(response.price);
        $('#amount').val(response.price).text(response.price);
      },
      error: function(response){
        console.log(response.responseJSON);
      }
     });
  });
  
  $('#propertyinfo').DataTable({
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
@stop
