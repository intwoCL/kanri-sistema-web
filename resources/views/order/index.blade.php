@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('provider.show',$provider->id))
  @slot('color', 'dark')
  @slot('body', "Listado de ordenes de compra")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de orden de compra</h3>
          <a href="{{ route('order.create',$provider->id) }}" class="btn btn-primary float-right btn-sm">Nuevo</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>Código orden</th>
            <th>Proveedor</th>
            <th>Usuario</th>
            <th>Fecha Emisión</th>
            <th>Fecha Envió</th>
            <th>Comentario</th>
            <th>Descuento</th>
            <th>IVA</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Estado</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($provider->detailsOrder as $do)
            <tr>
              <td>{{ $do->order_code }}</td>
              <td>
                <a href="{{ route('order.show',[$do->provider->id,$do->id]) }}">{{ $do->provider->presenter()->getFullName() }}</a>
              </td>
              <td>{{ $do->user->presenter()->getFullName() }}</td>
              <td>{{ $do->getDateIn()->getDate() }}</td>
              <td>@if ($do->delivery_date)
                {{ $do->getDateOut()->getDate() }}
                @endif
              </td>
              <td>{{ $do->comment }}</td>
              <td>{{ $do->discount }}%</td>
              <td>{{ $do->iva }}%</td>
              <td>$ {{ $do->getSubtotal() }}</td>
              <td>$ {{ $do->getTotal() }}</td>
              <td>{{ $do->presenter()->status() }}</td>
              <td>
                <a href="{{ route('order.edit',[$do->provider->id,$do->id]) }}" class="btn btn-success sm">Recibir</a>
              </td>
              <td>
                <form method="POST" action="{{ route('order.destroy', [$do->provider->id,$do->id]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush