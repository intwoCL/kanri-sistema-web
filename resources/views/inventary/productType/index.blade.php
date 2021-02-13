@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de tipo de producto")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Tipos de productos</h3>
          <a href="{{ route('types.create') }}" class="btn btn-primary float-right btn-sm">Nuevo</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($types as $type)
            <tr>
              <td>{{ $type->id }}</td>
              <td>{{ $type->name }}</td>
              <td>
                <a href="{{ route('types.edit',$type->id) }}">Editar</a>
              </td>
              <td>
                <form method="POST" action="{{ route('types.destroy', $type->id) }}">
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