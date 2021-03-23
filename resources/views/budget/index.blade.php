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
          <a href="{{ route('budget.create') }}" class="btn btn-success float-right btn-sm">{{ trans('button.new') }}</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>{{ trans('t.user.budget.user') }}</th>
            <th>{{ trans('t.user.budget.client') }}</th>
            <th>{{ trans('t.user.budget.start_date') }}</th>
            <th>{{ trans('t.user.budget.finish_date') }}</th>
            <th>{{ trans('t.user.budget.glosa') }}</th>
            <th>{{ trans('t.user.budget.subtotal') }}</th>
            <th>{{ trans('t.user.budget.total') }}</th>
            <th>{{ trans('t.user.budget.status') }}</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($budgets as $budget)
            <tr>
              <td>
                <a href="{{ route('budget.show',$budget->id) }}">{{ $budget->user->presenter()->getFullName() }}</a>
              </td>
              <td>{{ !empty($budget->client) ? $budget->client->presenter()->getFullName() : 'N/A' }}</td>
              <td>{{ $budget->getDateIn()->getDate() }}</td>
              <td>{{ $budget->getDateOut()->getDate() }}</td>
              <td>{{ $budget->glosa }}</td>
              <td>$ {{ $budget->getSubtotal() }}</td>
              <td>$ {{ $budget->getTotal() }}</td>
              <td>{{ $budget->presenter()->status() }}</td>
              <td>
                <a href="{{ route('budget.edit',$budget->id) }}">{{ trans('button.edit') }}</a>
              </td>
              <td>
                <form method="POST" action="{{ route('budget.destroy', $budget->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
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