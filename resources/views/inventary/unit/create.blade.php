@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('unit.index'))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de unidad de medida')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nuevo unidad</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('unit.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autocomplete="off" name="name" value="{{ old('name') }}" id="inputNombres" placeholder="Ingrese nombre unidad" required>
                  {!! $errors->first('name','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
@endpush