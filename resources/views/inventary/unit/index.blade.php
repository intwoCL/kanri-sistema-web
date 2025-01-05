@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de unidad de medida")
@endcomponent
<section class="content">
  <div class="row">
    @include('inventary.unit._tabs_unit')
    <div class="col-md-6">
      <div class="card">
        @include('inventary.unit._table_unit')
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush