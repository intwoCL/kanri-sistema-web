@php
  function active($url){return request()->is($url) ? 'active' : '';}
  function open($url){return request()->is($url) ? 'menu-open' : '';}
  $name = current_user()->presenter()->getFullName();
  // $img = "/dist/img/AdminLTELogo.png";
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
    <img src="/dist/image/logo.jpeg" alt="" class="brand-image brand-text elevation-3">

  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
        <img src="{{ $img }}" class="img-circle elevation-2" alt="User Image">
      </div> --}}
      <div class="info">
        <a href="/perfil" class="d-block">{{ $name }}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item {{ open('provider*') }}">
          <a href="{{ route('provider.index') }}" class="nav-link">
            <i class="nav-icon fab fa-chromecast"></i>
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
            <i class="nav-icon fas fa-graduation-cap mr-2"></i>
            <p>Salir</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>