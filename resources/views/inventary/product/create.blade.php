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
          <form class="form-horizontal" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Código</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" value="{{ old('code') }}" id="inputNombres" placeholder="Ingrese código" required>
                  {!! $errors->first('code','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autocomplete="off" name="name" value="{{ old('name') }}" id="inputNombres" placeholder="Ingrese nombre" required>
                  {!! $errors->first('name','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="textarea-input" rows="10" placeholder="Ingrese descripción.." value="{{ old('description') }}"></textarea>
                  {!! $errors->first('description','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Costo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('import_price') ? 'is-invalid' : '' }}" name="import_price" value="{{ old('import_price') }}" id="inputNombres" placeholder="Ingrese costo" required>
                  {!! $errors->first('import_price','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Valor</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('credit_price') ? 'is-invalid' : '' }}" name="credit_price" value="{{ old('credit_price') }}" id="inputNombres" placeholder="Ingrese valor" required>
                  {!! $errors->first('credit_price','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Categoría</label>
                <div class="col-sm-8">
                  <select name="category_id" id="select1" class="form-control {{ $errors->has('category_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($categories as $c)
                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('category_id','<div class="invalid-feedback">:message</div>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tipo Producto</label>
                <div class="col-sm-8">
                  <select name="product_type_id" id="select1" class="form-control {{ $errors->has('product_type_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($types as $t)
                      <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('product_type_id','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Unidad Medida</label>
                <div class="col-sm-8">
                  <select name="units_id" id="select1" class="form-control {{ $errors->has('units_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($units as $u)
                      <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('units_id','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Stock disponible</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('available_stock') ? 'is-invalid' : '' }}" name="available_stock" value="{{ old('available_stock') }}" id="inputNombres" placeholder="0" required>
                  {!! $errors->first('available_stock','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Stock crítico</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('critical_stock') ? 'is-invalid' : '' }}" name="critical_stock" value="{{ old('critical_stock') }}" id="inputNombres" placeholder="0" required>
                  {!! $errors->first('critical_stock','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPhoto" class="col-sm-4 col-form-label">Imagen <small class="text-danger">* (opcional)</small></label>
                <div class="col-sm-8">
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)">
                  <br>
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
<script src="/dist/js/preview.js"></script>
@endpush