@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de presupuesto")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de presupuestos</h3>
          <a href="{{ route('budget.create') }}" class="btn btn-primary float-right btn-sm">Nuevo</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>Usuario</th>
            <th>Cliente</th>
            <th>Fecha Inicio</th>
            <th>Fecha Termino</th>
            <th>Comentario</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Estado</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($budgets as $budget)
            <tr>
              <td>
                <a href="{{ route('budget.show',$budget->id) }}">{{ $budget->user->presenter()->getFullName() }}</a>
              </td>
              <td>{{ !empty($budget->client) ? $budget->client->presenter()->getFullName() : 'N/A' }}</td>
              <td>{{ $budget->start_date }}</td>
              <td>{{ $budget->finish_date }}</td>
              <td>{{ $budget->glosa }}</td>
              <td>$ {{ $budget->getSubtotal() }}</td>
              <td>$ {{ $budget->getTotal() }}</td>
              <td>{{ $budget->presenter()->status() }}</td>
              <td>
                <a href="{{ route('budget.edit',$budget->id) }}">Editar</a>
              </td>
              <td>
                <form method="POST" action="{{ route('budget.destroy', $budget->id) }}">
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