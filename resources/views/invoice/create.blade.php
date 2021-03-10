@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('invoice.index'))
  @slot('color', 'secondary')
  @slot('body', 'Formulario de boleta o factura')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nueva boleta o factura</h3>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('invoice.store') }}" enctype="multipart/form-data">
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
                <label class="col-sm-4 col-form-label">Cliente</label>
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
                <label class="col-sm-4 col-form-label">Empresa</label>
                <div class="col-sm-8">
                  <select name="company_id" id="select1" class="form-control {{ $errors->has('company_id') ? 'is_invalid' : '' }}" required>
                    <option value="0">Sin empresa</option>
                    @foreach ($company as $com)
                      <option value="{{ $com->id }}">{{ $com->name_company }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('client_id','<div class="invalid-feedback">:message</div>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tipo Cotización</label>
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