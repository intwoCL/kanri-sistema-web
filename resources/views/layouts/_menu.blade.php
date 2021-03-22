@php
  function active($url){return request()->is($url) ? 'active' : '';}
  function open($url){return request()->is($url) ? 'menu-open' : '';}
  $name = current_user()->presenter()->getFullName();
  $img = current_user()->company()->presenter()->getLogo();
@endphp
<aside class="main-sidebar sidebar-dark-dark elevation-4">
  <!-- Brand Logo -->
  {{-- <a href="" class="brand-link bg-white">
    <span class="brand-text font-weight-light">Nombre</span>
    <span class="brand-text">Nombre</span>
    <img src="/dist/image/logo.jpeg" alt="" class="brand-image brand-text elevation-3">
  </a> --}}
  <a href="{{ route('home') }}" class="brand-link bg-white text-sm">
    <span class="brand-text font-weight-light">Panel</span>
    <span class="brand-text"><b> Administrativo</b></span>
    {{-- <img src="{{ $img }}" alt="" width="50" height="100" class="brand-image brand-text elevation-3"> --}}
  </a>
  <div class="sidebar">
    <center>
      <img src="{{ $img }}" width="200" class="mt-1" alt="">
    </center>
    <div class="user-panel pb-3 mb-3 d-flex">
      <div class="info">
        <a href="/perfil" class="d-block">{{ $name }}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item {{ open('provider*') }}">
          <a href="{{ route('provider.index') }}" class="nav-link">
            <i class="fas fa-people-carry"></i>
            <p>Proveedor</p>
          </a>
        </li>
        <li class="nav-header">Herramientas</li>
        <li class="nav-item {{ open('utils*') }}">
          <a href="{{ route('utils.index') }}" class="nav-link">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>Utils</p>
          </a>
        </li>
        <li class="bg-danger" >
          <a href="{{ route('signOut') }}" class="nav-link">
            <i class="fas fa-times-circle"></i>
            <p>Salir</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>