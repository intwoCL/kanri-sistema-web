@extends('layouts.skeleton')
@section('app')
@include('layouts._nav')
@include('layouts._menu')
<div class="content-wrapper" style="min-height: 1203.6px;">
  @yield('content')
</div>

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Versión</b> 1.0
  </div>
  <strong>Kanri 2020</strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
@endsection