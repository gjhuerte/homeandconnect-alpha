@extends("layouts.master")
@section("title")
Reset
@stop
@section("style")
<style>
  body{
    padding-top: 170px;
  }

  .panel{
    margin-bottom: 110px;
  }
</style>
@stop
@section('content')
  @extends("layouts.nav.main.inverse")
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-offset-4 col-md-4">
              <div class="panel panel-shadow panel-padding">
                  <div class="panel-body">
                      <p>This will remove all the data stored in your database. By clicking the button below, you acknowledge to delete all the data in your database.</p>
                      <button type="submit" class="btn btn-danger btn-block">Reset</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
@stop