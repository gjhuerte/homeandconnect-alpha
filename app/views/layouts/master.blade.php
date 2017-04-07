<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Bootstrap -->
  <title>
    @yield('title')
  </title>
  {{ HTML::style(asset('css/dataTables.bootstrap.min.css')) }}
  {{ HTML::style(asset('css/bootstrap.min.css')) }}
  {{ HTML::style(asset('css/style.css')) }}
  {{ HTML::style(asset('css/jquery-ui.css')) }}
  {{ HTML::style(asset('css/sweetalert.css')) }}
  @yield('css-link')
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    @yield("style")
  </style>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  {{ HTML::script(asset('js/jquery.js')) }}
  {{ HTML::script(asset('js/bootstrap.min.js')) }}
  {{ HTML::script(asset('js/bootstrap-show-password.min.js')) }}
  {{ HTML::script(asset('js/jquery.validate.min.js')) }}
  {{ HTML::script(asset('js/ie-emulation-modes-warning.js')) }}
  {{ HTML::script(asset('js/ie10-viewport-bug-workaround.js')) }}
  {{ HTML::script(asset('js/vendor/holder.min.js')) }}
  <!-- data tables plugin -->
  {{ HTML::script(asset('js/jquery.dataTables.min.js')) }}
  {{ HTML::script(asset('js/dataTables.bootstrap.min.js')) }}
  <!-- notify -->
  {{ HTML::script(asset('js/bootstrap-notify.min.js')) }}
  {{ HTML::script(asset('js/jquery-ui.js')) }}
  {{ HTML::script(asset('js/sweetalert.min.js')) }}
</head>
<body>
  <div id="header">
    @yield('header')
  </div>
  <div id="content">
      @yield('content')
  </div>
  <div id="footer">
    @include('layouts.footer')
  </div>
  <script>
    @yield("script")
  </script>
</body>
  @yield("modal")
</html>
