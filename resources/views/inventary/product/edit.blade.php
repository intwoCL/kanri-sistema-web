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
            <h3 class="card-title">Actualizar producto</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">

              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Código<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" value="{{ $product->code }}" id="inputNombres" placeholder="Código" required>
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('code','<small id="code" class="form-text text-danger text-center">:message</small>') !!}
              </div>


              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Nombre<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autocomplete="off" name="name" value="{{ $product->name }}" id="inputNombres" placeholder="Nombre" required>
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('name','<small id="code" class="form-text text-danger text-center">:message</small>') !!}
              </div>


              <div class="form-group">
                <label for="comentario" class="col-form-label">Descripción</label>
                <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" name="description" id="description" maxlength="255" onkeyup="countChars(this,255);">{{ $product->description }}</textarea>
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
                  <input type="numeric" class="form-control {{ $errors->has('import_price') ? 'is-invalid' : '' }}" name="import_price" value="{{ $product->import_price }}" id="inputNombres" placeholder="0" required>
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
                  <input type="text" class="form-control {{ $errors->has('credit_price') ? 'is-invalid' : '' }}" name="credit_price" value="{{ $product->credit_price}}" id="inputNombres" placeholder="0" required>
                </div>
                {!! $errors->first('credit_price', '<small class="form-text text-danger">:message</small>') !!}
              </div> --}}
              

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Categoría</label>
                <div class="input-group col-sm-9">
                  <select name="category_id" id="select1" class="form-control {{ $errors->has('category_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($categories as $c)
                      <option {{ $c->id==$product->category_id ? 'selected' : ''}} value="{{ $c->id }}">{{ $c->name }}</option>
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
                    <option {{ $t->id==$product->product_type_id ? 'selected' : '' }} value="{{ $t->id }}">{{ $t->name }}</option>
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
                      <option {{ $u->id==$product->units_id ? 'selected' : '' }} value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('units_id','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div> --}}

              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Stock Disponible<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control {{ $errors->has('available_stock') ? 'is-invalid' : '' }}" name="available_stock" value="{{ $product->available_stock}}" id="inputNombres" placeholder="0" required>
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('available_stock','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>

              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-3">Stock Crítico<small class="text-danger">*</small></label>
                <div class="input-group col-sm-9">
                  <input type="text" class="form-control {{ $errors->has('critical_stock') ? 'is-invalid' : '' }}" name="critical_stock" value="{{ $product->critical_stock}}" id="inputNombres" placeholder="0" required>
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('critical_stock','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>


              <div class="form-group row">
                <label class="col-form-label col-sm-3">Imagen <small>(Opcional)</small></label>
                <div class="col-sm-8">
                  <img src="{{ $product->presenter()->getPhoto() }}" class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6 text-center">
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                </div>
                <div class="col-sm-12 text-center">
                  <div id="preview"></div>
                </div>
              </div>

              {{-- <div class="form-group">
                <label class="col-form-label">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div> --}}
              {{-- <div class="form-group center-text">
                <div id="preview"></div>
              </div> --}}
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
<script src="/dist/js/preview.js"></script>
@endpush