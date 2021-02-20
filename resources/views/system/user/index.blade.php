@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de usuario")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de usuarios</h3>
          <a href="{{ route('user.create') }}" class="btn btn-primary float-right btn-sm">Nuevo</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>Correo electrónico</th>
            <th>Nombre Completo</th>
            <th>Rol</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $user->email }}</td>
              <td>
                <a href="{{ route('user.show',$user->id) }}">{{ $user->presenter()->getFullName() }}</a>
              </td>
              <td>{{ $user->role->description }}</td>
              <td>
                <a href="{{ route('user.edit',$user->id) }}">Editar</a>
              </td>
              <td>
                <form method="POST" action="{{ route('user.destroy', $user->id) }}">
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