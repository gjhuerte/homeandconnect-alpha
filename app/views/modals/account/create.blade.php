<!-- Modal -->
<div class="modal fade" id="tenantmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-title"></h4>
      </div> <!-- end of header -->
        <!-- modal body -->
        <div class="modal-body" id="modal-body">
          {{ Form::open(array('class'=>'form-horizontal','id'=>'tenantForm')) }}
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Username') }}
              </div>
              <div class="col-sm-12">
                {{ Form::text('username',null,
                    array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Username')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                {{ Form::label('Password') }}
              </div>
              <div class="col-sm-12">
                {{ Form::password('password',
                    array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Password')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Verify Password') }}
            </div>
              <div class="col-sm-12">
                {{ Form::password('verify',
                    $attributes = array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Verify Password')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Last name') }}
              </div>
              <div class="col-sm-12">
                {{ Form::text('lastname',null,
                    array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Lastname')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('First name') }}
              </div>
              <div class="col-sm-12">
                {{ Form::text('firstname',null,
                    array('class'=>'form-control',
                    'placeholder'=>'Firstname')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Middle name') }}
              </div>
              <div class="col-sm-12">
                {{ Form::text('middlename',null,
                    array('class'=>'form-control',
                    'placeholder'=>'Middlename'))}}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Birth date') }}
              </div>
              <div class="col-sm-12">
                {{ Form::text('birthdate',null,
                  array('id'=>'datepicker',
                  'class'=>'form-control',  
                  'placeholder'=>'Month / Day / Year')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Email Address') }}
              </div>
              <div class="col-sm-12">
                {{ Form::email('email',null,
                  array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Email Address')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Cellphone Number') }}
              </div>
              <div class="col-sm-12">
                {{ Form::text('cellno',null,
                  array('class'=>'form-control',
                  'placeholder'=>'Cellphone Number')) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              {{ Form::label('Gender') }}
              </div>
              <label class="checkbox-inline">
                {{ Form::radio('gender','M',true) }}
                Male
              </label>
              <label class="checkbox-inline">
                {{ Form::radio('gender','F') }}
                Female
              </label>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-4">
                {{ Form::submit('Submit',
                  array('class'=>'pull-right btn btn-primary btn-block')) }}
              </div>
              <div class="col-sm-4">
                {{ Form::button('Clear',
                  array('class'=>'pull-right btn btn-danger btn-block',
                  'id'=>'clear')) }}
              </div>
            </div>
          {{ Form::close() }}
        </div> <!-- end of modal body -->
      </form>
    </div> <!-- modal content -->
  </div>
</div> <!-- end of modal -->
<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      maxAge: 59,
      minAge: 15
    });
  });

  $("#clear").click(function(){
    $("#tenantForm").trigger("reset");
  });
</script>