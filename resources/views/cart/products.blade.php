@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('cart.index'))
  @slot('color', 'dark')
  @slot('body', "Carrito de Compra")
@endcomponent
<section class="content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3>Productos</h3>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Producto</th>
                  <th>Nombre producto</th>
                  <th>Valor</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                </tr>
                </thead>
                {{-- <tbody>
                  @php $id = 1; @endphp
                  @foreach ($order->detailsOrder as $or)
                  <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $or->product->code }}</td>
                    <td>{{ $or->product->name }}</td>
                    <td>$ {{ $or->getPrice() }}</td>
                    <td>{{ $or->quantity }}</td>
                    <td>$ {{ $or->getTotal() }}</td>
                    <td>
                      <button class="btn btn-sm btn-danger" 
                      data-toggle="modal" 
                      data-target="#addProduct"
                      data-id="{{ $or->id }}">
                      <i class="fa fa-trash"></i>
                      </button>
                    </td>
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
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Productos</h3>
          </div>
          <div class="card-body table-responsive">
            <table id="table" class="table table-bordered table-hover table-sm">
              <thead>
              <tr>
                <th>Imagen</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th>Stock D.</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($product as $prod)
                <tr>
                  <td>
                    <div class="product-img">
                      <img src="{{ $prod->presenter()->getPhoto() }}" alt="Product Image" class="img-size-50">
                    </div>
                  </td>
                  <td>{{ $prod->code }}</td>
                  <td>{{ $prod->name }}</td>
                  <td>{{ $prod->description }}</td>
                  <td>$ {{ $prod->getImportPrice() }}</td>
                  <td>$ {{ $prod->getCreditPrice() }}</td>
                  <td>{{ $prod->productType->name }}</td>
                  <td>{{ $prod->available_stock }}</td>
                  <td>
                    <a href="{{ route('cart.store',$prod->id) }}" class="btn btn-sm btn-primary">Comprar</a>
                  </td>
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