@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('product.index'))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de producto')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nuevo producto</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Código<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control" name="code" placeholder="Código"
                    required="" value="{{ old('code') }}" autocomplete="new-code">
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('code','<small id="code" class="form-text text-danger text-center">:message</small>') !!}
              </div>

              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Nombre<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control" name="name" placeholder="Nombre"
                    required="" value="{{ old('name') }}" autocomplete="new-name">
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('name','<small id="name" class="form-text text-danger text-center">:message</small>') !!}
              </div>

              <div class="form-group">
                <label for="comentario" class="col-form-label">Descripción</label>
                <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" name="description" id="description" maxlength="255" onkeyup="countChars(this,255);">{{ old('description') }}</textarea>
                {!! $errors->first('description', '<small class="form-text text-danger">:message</small>') !!}
                <p id="limitC"></p>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Costo<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="numeric" class="form-control" name="import_price" id="import_price" autocomplete="off" maxlength="9" placeholder="0" value="{{ old('import_price') }}" required>
                </div>
                {!! $errors->first('import_price', '<small class="form-text text-danger">:message</small>') !!}
              </div>

              {{-- <div class="form-group row">
                <label class="col-sm-3 col-form-label">Valor<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="numeric" class="form-control" name="credit_price" id="credit_price" autocomplete="off" maxlength="9" placeholder="0" value="{{ old('credit_price') }}" required>
                </div>
                {!! $errors->first('credit_price', '<small class="form-text text-danger">:message</small>') !!}
              </div> --}}

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Categoría</label>
                <div class="input-group col-sm-9">
                  <select name="category_id" id="select1" class="form-control {{ $errors->has('category_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($categories as $c)
                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('category_id','<div class="invalid-feedback">:message</div>') !!}
                </div>
              </div>

              {{-- <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tipo Producto</label>
                <div class="input-group col-sm-9">
                  <select name="product_type_id" id="select1" class="form-control {{ $errors->has('product_type_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($types as $t)
                      <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('product_type_id','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div> --}}
              
              {{-- <div class="form-group row">
                <label class="col-sm-3 col-form-label">Unidad Medida</label>
                <div class="input-group col-sm-9">
                  <select name="units_id" id="select1" class="form-control {{ $errors->has('units_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($units as $u)
                      <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('units_id','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div> --}}

              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Stock Disponible<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control {{ $errors->has('available_stock') ? 'is-invalid' : '' }}" name="available_stock" value="{{ old('available_stock') }}" id="inputNombres" placeholder="0" required>
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('available_stock','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>

              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Stock Crítico<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control {{ $errors->has('critical_stock') ? 'is-invalid' : '' }}" name="critical_stock" value="{{ old('critical_stock') }}" id="inputNombres" placeholder="0" required>
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('critical_stock','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>

              <div class="form-group">
                <label class="col-form-label">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group center-text">
                <div id="preview"></div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">{{ trans('button.save') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/dist/js/preview.js"></script>
@endpush