@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'dark')
  @slot('body', "Listado de producto")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de productos</h3>
          <a href="{{ route('product.create') }}" class="btn btn-success float-right btn-sm">{{ trans('button.new') }}</a>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-bordered table-hover table-sm">
          <thead>
          <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Costo</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Tipo</th>
            <th>U.M.</th>
            <th>Stock D.</th>
            <th>Stock C.</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($products as $prod)
            <tr>
              <td>
                <a href="{{ route('product.show',$prod->id) }}">{{ $prod->code }}</a>
              </td>
              <td>{{ $prod->name }}</td>
              <td>{{ $prod->description }}</td>
              <td>$ {{ $prod->getImportPrice() }}</td>
              <td>$ {{ $prod->getCreditPrice() }}</td>
              <td>{{ $prod->category->name }}</td>
              <td>{{ $prod->productType->name }}</td>
              <td>{{ $prod->units->name }}</td>
              <td>{{ $prod->available_stock }}</td>
              <td>{{ $prod->critical_stock }}</td>
              <td>
                <a href="{{ route('product.edit',$prod->id) }}">{{ trans('button.edit') }}</a>
              </td>
              <td>
                <form method="POST" action="{{ route('product.destroy', $prod->id) }}">
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