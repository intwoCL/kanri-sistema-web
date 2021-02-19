@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route',  route('budget.index'))
  @slot('color', 'dark')
  @slot('body', "Vista de presupuesto")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Resumen General</h3>
          </div>
          @include('budget._info_budget')
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
            <form action="{{ route('budget.recalculated',$budget->id) }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $budget->id }}">
              <button class="mb-2 btn btn-primary btn-sm" type="submit">Recalcular</button>
            </form>
            <a href="{{ route('preview',$budget->id) }}" target="_blank" rel="noopener noreferrer" class="nav-link"><i class="fa fa-file fa-xs mr-2"></i> Visualizar</a>
            <a href="{{ route('imprimir',$budget->id) }}" class="nav-link"><i class="fa fa-user fa-xs mr-2"></i> Descargar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Servicios</h3>
            <a href="{{ route('budget.service',$budget->id) }}" class="btn btn-success float-right btn-sm">Agregar servicios</a>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-sm">
              <thead>
              <tr>
                <th>#</th>
                <th>Servicio</th>
                <th>Costo</th>
              </tr>
              </thead>
              <tbody>
                @php $id = 1; @endphp
                @foreach ($budget->detailsService as $ds)
                <tr>
                  <td>{{ $id++ }}</td>
                  <td>{{ $ds->name_service }}</td>
                  <td>{{ $ds->getUniqueValue() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Productos</h3>
            <a href="{{ route('budget.products',$budget->id) }}" class="btn btn-success float-right btn-sm">Agregar productos</a>
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
              <tbody>
                @php $id = 1; @endphp
                @foreach ($budget->detailsProduct as $dp)
                <tr>
                  <td>{{ $id++ }}</td>
                  <td>{{ $dp->product->code }}</td>
                  <td>{{ $dp->product_name }}</td>
                  <td>{{ $dp->getUnitValue() }}</td>
                  <td>{{ $dp->quantity }}</td>
                  <td>{{ $dp->getTotal() }}</td>
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