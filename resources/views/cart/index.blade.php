@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Carrito de Compra")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Productos</h3>
            <a href="{{ route('cart.product') }}" class="btn btn-success float-right btn-sm">Comprar productos</a>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-sm">
              <thead>
              <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Nombre producto</th>
                <th>Valor</th>
                <th>Cantidad</th>
                <th>Total</th>
              </tr>
              </thead>
              {{-- <tbody>
                @php $id = 1; @endphp
                @foreach ($order->detailsOrder as $do)
                <tr>
                  <td>{{ $id++ }}</td>
                  <td>{{ $do->product->code }}</td>
                  <td>{{ $do->product_name }}</td>
                  <td>{{ $do->product->productType->name }}</td>
                  <td>{{ $do->getPrice() }}</td>
                  <td>{{ $do->quantity }}</td>
                  <td>{{ $do->getTotal() }}</td>
                </tr>
                @endforeach
              </tbody> --}}
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