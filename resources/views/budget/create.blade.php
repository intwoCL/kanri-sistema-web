@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('budget.index'))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de presupuesto')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nuevo presupuesto</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('budget.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">{{ trans('t.user.budget.client') }}</label>
                <div class="col-sm-8">
                  <select name="client_id" id="select1" class="form-control {{ $errors->has('client_id') ? 'is_invalid' : '' }}" required>
                    <option value="0">Sin Cliente</option>
                    @foreach ($clients as $c)
                      <option value="{{ $c->id }}">{{ $c->presenter()->getFullName() }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('client_id','<div class="invalid-feedback">:message</div>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">{{ trans('t.user.budget.start_date') }}</label>
                <div class="col-sm-8">
                  <input id="start" type="datetime-local" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" name="start_date" value="{{ old('start_date') }}" id="inputNombres" placeholder="Ingrese fecha inicio" required>
                  {!! $errors->first('start_date','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">{{ trans('t.user.budget.finish_date') }}</label>
                <div class="col-sm-8">
                  <input id="finish" type="datetime-local" class="form-control {{ $errors->has('finish_date') ? 'is-invalid' : '' }}" name="finish_date" value="{{ old('finish_date') }}" id="inputNombres" placeholder="Ingrese fecha termino" required>
                  {!! $errors->first('finish_date','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">{{ trans('t.user.budget.glosa') }}</label>
                <div class="col-sm-8">
                  <textarea class="form-control {{ $errors->has('glosa') ? 'is-invalid' : '' }}" name="glosa" id="textarea-input" rows="10" placeholder="Ingrese comentario.." value="{{ old('glosa') }}"></textarea>
                  {!! $errors->first('glosa','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">{{ trans('t.user.budget.status') }}</label>
                <div class="col-sm-8">
                  <select name="status" id="select1" class="form-control {{ $errors->has('status') ? 'is_invalid' : '' }}" required>
                    @foreach ($status as $key=> $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('status','<div class="invalid-feedback">:message</div>') !!}
                </div>
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
<script>
  var dateControl = document.querySelector('input[type="datetime-local"]');
</script>
@endpush