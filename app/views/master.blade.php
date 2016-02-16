<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!-- Web Metadata /-->
  <title>{{{ $title or 'Clutter' }}}</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <link rel="icon" type="image/png" href="{{ asset('packages/bootflat/favicon_16.ico') }}" />

  @section('styles')
    <link rel="stylesheet" href="{{ asset('packages/bootflat/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/bootflat/bootflat/css/bootflat.css') }}" />
    <style>
    html,
    body
    {
      background-color: #F1F2F6;
    }
    </style>
  @show

  @section('scripts')
    <script src="{{ asset('packages/bootflat/js/jquery-1.10.1.min.js') }}"></script>
    <script src="{{ asset('packages/bootflat/js/bootstrap.min.js') }}"></script>
  @show
</head>
<body>
<div class="container">
  @yield('content')
</div>
</body>
</html>
