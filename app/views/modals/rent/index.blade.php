<div class="modal fade" id="rentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Rent</h3>
      </div>
      <div class="modal-body">
        {{ Form::open(array(
            'class'=>'form-horizontal',
            'id'=>'rentForm')) }}
        <!-- tenant -->
        <div class="form-group">
          <div class="col-sm-6">
            <label for='tenant'>Tenant Number</label>
          </div>
          <div class="col-sm-6">
            <h5 class="tenant-number" name='tenantno' id='_tenantno'></h5>
            <input type="hidden" name='tenantno'  id='tenantno'/>
          </div>
        </div><!-- end of tenant -->
        <!-- unit -->
        <div class='form-group'>
          <div class="col-sm-6">
            <label for='unit'>Unit Number</label>
          </div>
          <div class="col-sm-6">
             <select class="form-control" id="unitno" name="unitno">
                @foreach($property as $unit)
                <option value='{{ $unit->unitno }}'>{{ $unit->unitno }}</option>
                @endforeach
             </select>
          </div>
        </div> <!-- end of unit -->
        <div class='form-group'>
          <div class="col-sm-6">
            <label for='amount'>Downpayment amount:</label>
          </div>
          <div class="col-sm-6">
            <p class="form-control" name='_amount' id='_amount'></p>
            <input type="hidden" name="amount" id="amount" />
          </div>
        </div> <!-- end of amount -->
        <!-- contract information -->
        <div class='form-group'>
          <div class="col-sm-12">
            <strong>Note:</strong> Before finishing your transaction. You need to have the tenant sign this contract. <a href='../forms/leasing_contract_form.pdf' target='_blank'>Click me</a> to print the contract information.
          </div>
        </div><!-- end of body -->  
      </div> <!-- end of col-md-4 -->
      <div class="modal-footer">
        <!-- button -->
        <div class='form-group'>
          <div class="col-sm-offset-8 col-sm-4">
            {{ Form::submit('Rent',array(
                'class'=>'btn btn-success btn-block btn-md')) }} 
          </div>
        </div><!-- end of button -->
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>