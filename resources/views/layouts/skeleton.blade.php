<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Kanri Inventario')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    .spinner {
      display: none;
    }
  </style>
  {{-- @if (auth('usuario')->check())
    @if (current_user()->config_theme!='default')
      <link rel="stylesheet" href="/dist/theme/{{ current_user()->config_theme }}/bootstrap.css">
    @endif
  @endif --}}
  @stack('stylesheet')
</head>
<body class="text-sm hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper" id="app">
    @yield('app')
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  @include('layouts._toast')
  @stack('javascript')
</body>
</html>
