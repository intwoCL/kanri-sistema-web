@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('client.index'))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de cliente')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nuevo cliente</h3>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('client.update',$client->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Rut</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('rut') ? 'is-invalid' : '' }}" name="rut" value="{{ $client->rut }}" id="inputNombres" placeholder="Ingrese código" required>
                  {!! $errors->first('rut','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nombres</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('names') ? 'is-invalid' : '' }}" autocomplete="off" name="names" value="{{ $client->names }}" id="inputNombres" placeholder="Ingrese nombre tipo producto" required>
                  {!! $errors->first('names','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Apellido</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('surnames') ? 'is-invalid' : '' }}" autocomplete="off" name="surnames" value="{{ $client->surnames }}" id="inputNombres" placeholder="Ingrese nombre tipo producto" required>
                  {!! $errors->first('surnames','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ $client->email }}" id="inputNombres" placeholder="Ingrese valor importación" required>
                  {!! $errors->first('email','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Télefono</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" value="{{ $client->phone }}" id="inputNombres" placeholder="Ingrese valor importación" required>
                  {!! $errors->first('phone','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Actualizar</button>
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