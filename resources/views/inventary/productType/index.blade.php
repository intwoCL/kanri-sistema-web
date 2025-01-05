@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de tipo de producto")
@endcomponent
<section class="content">
  <div class="row">
    @include('inventary.productType._tabs_product_type')
    <div class="col-md-6">
      <div class="card">
        @include('inventary.productType._table_product_type')
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush