@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('provider.order',[$provider->id,$order->id]))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de orden de compra')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Actualizar orden</h3>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('order.update',[$provider->id,$order->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fecha Entrega</label>
                <div class="col-sm-8">
                  <input id="start" type="datetime-local" class="form-control {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" name="delivery_date" value="{{ old('delivery_date') }}" id="inputNombres" placeholder="Ingrese fecha entrega" required>
                  {!! $errors->first('delivery_date','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
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
                  <th>Cantidad recibida</th>
                </tr>
                </thead>
                <tbody>
                  @php $id = 1; @endphp
                  @foreach ($order->detailsOrder as $do)
                  <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $ds->product->code }}</td>
                    <td>{{ $ds->product->name }}</td>
                    <td>{{ $ds->product->productType->name }}</td>
                    <td>{{ $ds->getPrice() }}</td>
                    <td>{{ $ds->quantity }}</td>
                    <td>{{ $ds->getTotal() }}</td>
                    <td>
                      <input type="text" class="form-control {{ $errors->has('new_quantity') ? 'is_invalid' : '' }}" name="new_quantity" placeholder="0">
                      {!! $errors->first('new_quantity','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush