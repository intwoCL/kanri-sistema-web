@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('provider.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de proveedor")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Información del proveedor</h3>
          </div>
          @include('system.provider._info_provider')
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Ajustes
            </h3>
          </div>
          <div class="card-body">
            <a href="{{ route('provider.order',$provider->id) }}" class="nav-link"><i class="fas fa-file-alt"></i> Orden Compra</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Productos</h3>
            <a href="{{ route('provider.products.create',$provider->id) }}" class="btn btn-success float-right btn-sm">Agregar producto</a>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-sm">
              <thead>
              <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Nombre producto</th>
                <th>Tipo</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @php $id = 1; @endphp
                @foreach ($provider->detailsProduct as $dp)
                <tr>
                  <td>{{ $id++ }}</td>
                  <td>{{ $dp->product->code }}</td>
                  <td>{{ $dp->product->name }}</td>
                  <td>{{ $dp->product->productType->name }}</td>
                  <td>$ {{ $dp->getPrice() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush