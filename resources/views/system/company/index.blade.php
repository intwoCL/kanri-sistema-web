@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('utils.index'))
  @slot('color', 'secondary')
  @slot('body', 'Configuracion del sistema')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nuevo empresa</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('company.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">RUT compañia</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('run') ? 'is-invalid' : '' }}" autocomplete="off" name="run" value="{{ $company->run }}" id="inputNombres" placeholder="">
                  {!! $errors->first('run','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nombre dueño</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('name_owner') ? 'is-invalid' : '' }}" autocomplete="off" name="name_owner" value="{{ $company->name_owner }}" id="inputNombres" placeholder="">
                  {!! $errors->first('name_owner','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nombre Compañia</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('name_company') ? 'is-invalid' : '' }}" autocomplete="off" name="name_company" value="{{ $company->name_company }}" id="name_company" placeholder="">
                  {!! $errors->first('name_company','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Rubro</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" autocomplete="off" name="type" value="{{ $company->type }}" id="type" placeholder="">
                  {!! $errors->first('type','<small id="type" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Teléfono</label>
                <div class="col-sm-8">
                  <input type="tel" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" autocomplete="off" name="phone" value="{{ $company->phone }}" id="phone" placeholder="">
                  {!! $errors->first('phone','<small id="phone" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Correo Electrónico</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off" name="email" value="{{ $company->email }}" id="email" placeholder="">
                  {!! $errors->first('email','<small id="email" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="row form-group row">
                <label for="formGroupExampleInput" class="col-sm-4">Región</label>
                <div class="col-sm-8">
                  <select class="custom-select" id="select_region" name="region"   onChange="CargarComunas()">
                  </select>
                </div>
              </div>

              <div class="row form-group row">
                  <label for="formGroupExampleInput" class="col-sm-4">Comuna</label>
                  <div class="col-sm-8">
                    <select class="custom-select {{ $errors->has('city_id') ? 'is-invalid' : '' }}" name='city_id' id="select_comuna">
                    </select>
                  </div>
                  {!! $errors->first('city_id', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
              </div>


              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Dirección</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" autocomplete="off" name="address" value="{{ $company->address }}" id="address" placeholder="">
                  {!! $errors->first('address','<small id="address" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>


              <div class="form-group row">
                <label class="col-sm-4 col-form-label">WEB</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('web_site') ? 'is-invalid' : '' }}" autocomplete="off" name="web_site" value="{{ $company->web_site }}" id="web_site" placeholder="">
                  {!! $errors->first('web_site','<small id="web_site" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>


              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Color compañia</label>
                <div class="col-sm-8">
                  <input type="color" class="form-control {{ $errors->has('color_company') ? 'is-invalid' : '' }}" autocomplete="off" name="color_company" value="{{ $company->color_company }}" id="color_company" placeholder="">
                  {!! $errors->first('color_company','<small id="color_company" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen de fondo</label>
                <div class="input-group">
                  <img src="{{ $company->presenter()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group row center-text">
                <div id="preview"></div>
              </div>

              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Logo</label>
                <div class="input-group">
                  <img src="{{ $company->presenter()->getLogo() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="file" name="logo" accept="image/*" onchange="preview2(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group row center-text">
                <div id="preview2"></div>
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
<script src="/vendor/intwo/preview2.js"></script>
<script>
  var comunas = [
    @foreach ($cities as $c)
      {'name':'{{ $c->name }}','id':'{{ $c->id }}','id_region':'{{ $c->region_id}}'},
    @endforeach
  ];
  var regiones = [
    @foreach ($regions as $r)
      {'name':'{{ $r->name }}','id_region':'{{ $r->id }}'},
    @endforeach
  ];

  CargarRegiones('select_region')
  CargarComunas();

  function CargarRegiones(selectId){
    var select = $('#'+selectId);
    select.find('option').remove();
    $.each(regiones, function(key,value) {
        select.append('<option value=' + value.id_region + '>' + value.name + '</option>');
    });
  }
  function CargarComunas(){
    var select = $('#select_comuna');
    select.find('option').remove();

    var id_r = document.getElementById("select_region").value;
    var coms = comunas.filter( c => c.id_region==id_r);

    $.each(coms, function(key,value) {
        select.append('<option value=' + value.id + '>' + value.name + '</option>');
    });
  }
  function CargarComunasEdit(){
    var select = $('#select_comuna_edit');
    select.find('option').remove();
    var id_r = document.getElementById("select_region_edit").value;
    var coms = comunas.filter( c => c.id_region==id_r);
    $.each(coms, function(key,value) {
        select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
    });
  }
</script>
@endpush