<!-- topmost container -->
<div class="container-fluid">
  <form method="POST" enctype="multipart/form-data" class="form-horizontal">
    <div class="row">
      <!-- left side -->
      <div class="col-md-6">
        <!-- main image -->
        <div class="col-md-6">
          <!-- main panel -->
          <div class="panel panel-default">
            <!-- heading -->
            <div class="panel-heading">
              Living room Image
            </div> <!-- end of heading -->
            <!-- body -->
            <div class="panel-body">
              <div class='col-md-12'>
                <img id='mainimage' src="../img/sample/no_image.png" alt="main image" class="img-responsive img-rounded" style="height:200px;">
              </div>
            </div> <!-- end of body -->
            <!-- footer -->
            <div class="panel-footer">
              <input type="file" name='mainimage' class='img-responsive' id="main" onchange='displayImage(this,"#mainimage");'>
            </div>
          </div> <!-- end of footer -->
        </div> <!-- end of main image -->
        <!-- main image -->
        <div class="col-md-6">
          <!-- bedroom panel -->
          <div class="panel panel-default">
            <!-- heading -->
            <div class="panel-heading">
              Bedroom Image
            </div> <!-- end of heading -->
            <!-- body -->
            <div class="panel-body">
              <div class='col-md-12'>
                <img id = 'bedroomimage' src="../img/sample/no_image.png" alt="bedroom image" class="img-responsive img-rounded" style="height:200px;">
              </div>
            </div> <!-- end of body -->
            <!-- footer -->
            <div class="panel-footer">
              <input type="file" name='bedroomimage' class='img-responsive' id="bedroom" onchange='displayImage(this,"#bedroomimage");'>
            </div>
          </div> <!-- end of footer -->
        </div> <!-- end of bedroom image -->
        <!-- balcony image -->
        <div class="col-md-4">
          <!-- main panel -->
          <div class="panel panel-default">
            <!-- heading -->
            <div class="panel-heading">
              Balcony Image
            </div> <!-- end of heading -->
            <!-- body -->
            <div class="panel-body">
              <div class='col-md-12'>
                <img id='balconyimage' src="../img/sample/no_image.png" alt="balcony image" class="img-responsive img-rounded" style="height:100px;">
              </div>
            </div> <!-- end of body -->
            <!-- footer -->
            <div class="panel-footer">
              <input type="file" name='balconyimage' class='img-responsive' id="balcony" onchange='displayImage(this,"#balconyimage");'>
            </div>
          </div> <!-- end of footer -->
        </div> <!-- end of balcony image -->
        <!-- kithcen image -->
        <div class="col-md-4">
          <!-- main panel -->
          <div class="panel panel-default">
            <!-- heading -->
            <div class="panel-heading">
              Kitchen Image
            </div> <!-- end of heading -->
            <!-- body -->
            <div class="panel-body">
              <div class='col-md-12'>
                <img id='kitchenimage' src="../img/sample/no_image.png" alt="kitchen image" class="img-responsive img-rounded" style="height:100px;">
              </div>
            </div> <!-- end of body -->
            <!-- footer -->
            <div class="panel-footer">
              <input type="file" name='kitchenimage' class='img-responsive' id="kitchen" onchange='displayImage(this,"#kitchenimage");'>
            </div>
          </div> <!-- end of footer -->
        </div> <!-- end of kitchen image -->
        <!-- bathroom image -->
        <div class="col-md-4">
          <!-- main panel -->
          <div class="panel panel-default">
            <!-- heading -->
            <div class="panel-heading">
              Bathroom Image
            </div> <!-- end of heading -->
            <!-- body -->
            <div class="panel-body">
              <div class='col-md-12'>
                <img id='bathroomimage' src="../img/sample/no_image.png" alt="bathroom image" class="img-responsive img-rounded" style="height:100px;">
              </div>
            </div> <!-- end of body -->
            <!-- footer -->
            <div class="panel-footer">
              <input type="file" name='bathroomimage' class='img-responsive' id="bathroom"onchange='displayImage(this,"#bathroomimage");'>
            </div>
          </div> <!-- end of footer -->
        </div> <!-- end of bathroom image -->
      </div> <!-- end of left side -->
      <!-- right side -->
      <div class="col-md-6">
        <!-- unitnumber -->
        <div class="col-md-6">
          <div class="panel panel-body">
            <label for='unitno'>Unit Number</label>
            <input type='text' class='form-control' name='unitno' id="unitno" placeholder='Enter unit number here...'>
          </div> <!-- end of panel body -->
        </div> <!-- end of unitnumber -->
        <!-- rent amount -->
        <div class="col-md-6">
          <div class="panel panel-body">
            <label for="price">Rent Amount</label>
            <input type='text' class='form-control' rows='6' name='price' placeholder='Enter amount here...'>
          </div> <!-- end of panel body -->
        </div> <!-- end of rent amount -->
        <!-- house description -->
        <div class="col-md-12">
          <div class="panel panel-body">
            <label for='description'>House Description</label>
            <textarea class='form-control' rows='6' name='description' placeholder='e.g. studio type, 1 bathroom'></textarea>
          </div> <!-- end of panel body -->
        </div> <!-- end of house description-->
        <!-- house address -->
        <div class="col-md-12">
          <div class="panel panel-body">
            <label for="address">Address</label>
            <textarea class='form-control' rows='6' name='address' placeholder='Enter address here...'></textarea>
          </div> <!-- end of panel body -->
        </div> <!-- end of address -->
        <div class="col-md-12">
          <div class="panel panel-body">
            <div class="col-md-offset-4 col-md-4">
              <button type="submit" class="btn btn-success btn-block" name="add">Add</button>
            </div>
            <div class="col-md-4 pull-right" hidden>
              <button type="submit" class="btn btn-warning btn-block" name="update">Update</button>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-danger btn-block" name="cancel">Cancel</button>
            </div>
          </div>
        </div>
      </div> <!-- end of right side -->
    </div>
  </form>
</div> <!-- end of container-fluid -->
