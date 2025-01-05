@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-12">
    <h1>Ajuste y Perfil de Usuario</h1>
    </div>
  </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item mr-2">
        <a class="nav-link active border border-primary border-bottom" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab" aria-controls="pills-user" aria-selected="true">Mi perfil</a>
        </li>
        <li class="nav-item mr-2">
        <a class="nav-link border border-primary border-bottom" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="false">Contraseña</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        @include('config._profile')
        @include('config._password')
      </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/dist/js/preview.js"></script>
@endpush