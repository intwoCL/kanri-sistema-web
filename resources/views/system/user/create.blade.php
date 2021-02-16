@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('user.index'))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de usuario')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nuevo usuario</h3>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="inputNombres" placeholder="Ingrese email" required>
                  {!! $errors->first('email','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Contraseña <small class="text-danger"* (123456)></small></label>
                <div class="col-sm-8">
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}" id="inputNombres" placeholder="Ingrese contraseña" required>
                  {!! $errors->first('password','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" autocomplete="off" name="first_name" value="{{ old('first_name') }}" id="inputNombres" placeholder="Ingrese nombre" required>
                  {!! $errors->first('first_name','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Apellido</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" autocomplete="off" name="last_name" value="{{ old('last_name') }}" id="inputNombres" placeholder="Ingrese apellido" required>
                  {!! $errors->first('last_name','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Rol</label>
                <div class="col-sm-8">
                  <select name="rol_id" id="select1" class="form-control {{ $errors->has('rol_id') ? 'is_invalid' : '' }}" required>
                    @foreach ($roles as $r)
                      <option value="{{ $r->id }}">{{ $r->description }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('rol_id','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputPhoto" class="col-sm-4 col-form-label">Foto <small class="text-danger">* (opcional)</small></label>
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