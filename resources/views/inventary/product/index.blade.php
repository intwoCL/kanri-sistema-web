@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de producto")
@endcomponent
<section class="content">
  <div class="row">
    @include('inventary.product._tabs_productos')
    <div class="col-md-12">
      <div class="card">
        @include('inventary.product._table_productos')
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush