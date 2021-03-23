@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de cliente")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de clientes</h3>
          <a href="{{ route('client.create') }}" class="btn btn-success float-right btn-sm">{{ trans('button.new') }}</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>{{ trans('t.user.provider.rut') }}</th>
            <th>{{ trans('t.user.provider.full_name') }}</th>
            <th>{{ trans('t.user.client.email') }}</th>
            <th>{{ trans('t.user.provider.phone') }}</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($clients as $clie)
            <tr>
              <td>{{ $clie->rut }}</td>
              <td>
                <a href="{{ route('client.show',$clie->id) }}">{{ $clie->presenter()->getFullName() }}</a>
              </td>
              <td>{{ $clie->email }}</td>
              <td>{{ $clie->phone }}</td>
              <td>
                <a href="{{ route('client.edit',$clie->id) }}">{{ trans('button.edit') }}</a>
              </td>
              <td>
                <form method="POST" action="{{ route('client.destroy', $clie->id) }}">
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