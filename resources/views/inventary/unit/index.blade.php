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
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Unidad de Medida</h3>
          <a href="{{ route('unit.create') }}" class="btn btn-success float-right btn-sm">{{ trans('button.new') }}</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>{{ trans('t.id') }}</th>
            <th>{{ trans('t.name') }}</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($units as $unit)
            <tr>
              <td>{{ $unit->id }}</td>
              <td>{{ $unit->name }}</td>
              <td>
                <a href="{{ route('unit.edit',$unit->id) }}">{{ trans('button.edit') }}</a>
              </td>
              <td>
                <form method="POST" action="{{ route('unit.destroy', $unit->id) }}">
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