@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de categorias")
@endcomponent
<section class="content">
  <div class="row">
    @include('inventary.category._tabs_category')
    <div class="col-md-6">
      <div class="card">
        @include('inventary.category._table_category')
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush