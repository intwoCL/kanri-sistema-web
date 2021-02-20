@extends('layouts.app')
@section('content')
@component('components.button._back')
  {{-- @slot('route', route('budget.index')) --}}
  {{-- @slot('color', 'secondary') --}}
  @slot('body', 'Configuracion del sistema')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nuevo presupuesto</h3>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('budget.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Comentario</label>
                <div class="col-sm-8">
                  <textarea class="form-control {{ $errors->has('glosa') ? 'is-invalid' : '' }}" name="glosa" id="textarea-input" rows="10" placeholder="Ingrese comentario.." value="{{ old('glosa') }}"></textarea>
                  {!! $errors->first('glosa','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
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
<script>
  var dateControl = document.querySelector('input[type="datetime-local"]');
</script>
@endpush