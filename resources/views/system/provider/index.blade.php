@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de proveedor")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de proveedores</h3>
          <a href="{{ route('provider.create') }}" class="btn btn-success float-right btn-sm">{{ trans('button.new') }}</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>Rut</th>
            <th>Nombre Completo</th>  
            <th>Dirección</th>
            <th>Correo electrónico</th>
            <th>Télefono</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($providers as $provider)
            <tr>
              <td>{{ $provider->rut }}</td>
              <td>
                <a href="{{ route('provider.show',$provider->id) }}">{{ $provider->presenter()->getFullName() }}</a>
              </td>
              <td>{{ $provider->address }}</td>
              <td>{{ $provider->email }}</td>
              <td>{{ $provider->phone }}</td>
              <td>
                <a href="{{ route('provider.edit',$provider->id) }}">{{ trans('button.edit') }}</a>
              </td>
              <td>
                <form method="POST" action="{{ route('provider.destroy', $provider->id) }}">
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