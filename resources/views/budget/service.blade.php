@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('budget.show',$budget->id))
  @slot('color', 'dark')
  @slot('body', "Listado de presupuesto")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md 5">
        <div class="card">
          @include('budget._info_budget')
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Servicios</h3>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-sm">
              <thead>
              <tr>
                <th>#</th>
                <th>Servicio</th>
                <th>Valor</th>
              </tr>
              </thead>
              <tbody>
                @php $id = 1; @endphp
                @foreach ($budget->detailsService as $ds)
                <tr>
                  <td>{{ $id++ }}</td>
                  <td>{{ $ds->name_service }}</td>
                  <td>$ {{ $ds->getUniqueValue() }}</td>
                  <td>
                    <button class="btn btn-sm btn-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <form action="{{ route('budget.service.store',$budget->id) }}" class="form-horizontal" method="POST">
          @csrf
          <div class="card card-blue">
            <div class="card-header">
              <h3 class="card-title">Formulario</h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Servicios</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('name_service') ? 'is-invalid' : '' }}" autocomplete="off" name="name_service" value="{{ old('name_service') }}" id="inputNombres" placeholder="Ingrese nombre servicio" required>
                  {!! $errors->first('name_service','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Costo</label>
                <div class="col-sm-8">
                  <input type="text" min="0" class="form-control {{ $errors->has('unique_value') ? 'is-invalid' : '' }}" name="unique_value" value="{{ old('unique_value') }}" id="inputNombres" placeholder="0" required pattern="^[0-9]+">
                  {!! $errors->first('unique_value','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush