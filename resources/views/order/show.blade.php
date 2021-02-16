@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route',  route('provider.order',$provider->id))
  @slot('color', 'dark')
  @slot('body', "Vista de orden")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Resumen General Orden de Compra</h3>
          </div>
          @include('order._info_order')
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Resumen General Proveedor</h3>
          </div>
          @include('order._info_provider')
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
            <form action="{{ route('provider.order.recalculated',[$provider->id,$order->id]) }}" method="POST">
              @csrf
              <input type="hidden" name="provider_id" value="{{ $provider->id }}">
              <button class="mb-2 btn btn-primary btn-sm" type="submit">Recalcular</button>
            </form>
            <a href="{{ route('provider.order.preview',[$provider->id,$order->id]) }}" target="_blank" rel="noopener noreferrer" class="nav-link"><i class="fa fa-file fa-xs mr-2"></i> Visualizar</a>
            <a href="{{ route('provider.order.print',[$provider->id,$order->id]) }}" class="nav-link"><i class="fa fa-user fa-xs mr-2"></i> Descargar</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Productos</h3>
              <a href="{{ route('provider.order.details',[$provider->id,$order->id]) }}" class="btn btn-success float-right btn-sm">Agregar productos</a>
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
                  <th>Cantidad</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                  @php $id = 1; @endphp
                  @foreach ($order->detailsOrder as $do)
                  <tr>>
                    <td>{{ $id++ }}</td>
                    <td>{{ $do->product->code }}</td>
                    <td>{{ $do->product_name }}</td>
                    <td>{{ $do->product->productType->name }}</td>
                    <td>{{ $do->getUnitValue() }}</td>
                    <td>{{ $do->quantity }}</td>
                    <td>{{ $do->getTotal() }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')

@endpush