@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('provider.order',$provider->id))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de orden de compra')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nueva orden</h3>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('provider.order.store',$provider->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Fecha Emisión</label>
                <div class="col-sm-8">
                  <input id="start" type="datetime-local" class="form-control {{ $errors->has('issue_date') ? 'is-invalid' : '' }}" name="issue_date" value="{{ old('issue_date') }}" id="inputNombres" placeholder="Ingrese fecha emision" required>
                  {!! $errors->first('issue_date','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Comentario</label>
                <div class="col-sm-8">
                  <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="textarea-input" rows="10" placeholder="Ingrese comentario.." value="{{ old('comment') }}"></textarea>
                  {!! $errors->first('comment','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
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