@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('types.index'))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de tipo de producto')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Actualizar tipo</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('types.update', $type->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Nombre</label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autocomplete="new-name" name="name" value="{{ $type->name }}" id="inputNombres" placeholder="Nombre" required>
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('name','<small id="name" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">{{ trans('button.update') }}</button>
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