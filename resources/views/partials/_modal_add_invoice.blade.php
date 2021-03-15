<div class="modal fade" id="addInvoice">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" id="formAdd">
        @csrf
        <input type="hidden" name="invoice_id" id="inputIdInvoice">
        <div class="modal-body">
          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-4">Fecha Emisión</label>
            <div class="input-group col-sm-8">
              <div class="input-group-addon input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-clock"></i>
                </div>
              </div>
              <input id="start" type="datetime-local" class="form-control {{ $errors->has('issue_date') ? 'is-invalid' : '' }}" name="issue_date" value="{{ old('issue_date') }}" id="inputNombres" placeholder="Ingrese fecha emision" required>
              {!! $errors->first('issue_date','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
          </div>
          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-4">Cliente</label>
            <div class="input-group col-sm-8">
              <div class="input-group-addon input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-user-alt"></i>
                </div>
              </div>
              <select name="client_id" id="select1" class="form-control {{ $errors->has('client_id') ? 'is_invalid' : '' }}" required>
                <option value="0">Sin Cliente</option>
              </select>
              {!! $errors->first('client_id','<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-4">Empresa</label>
            <div class="input-group col-sm-8">
              <div class="input-group-addon input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-building"></i>
                </div>
              </div>
              <select name="company_id" id="select1" class="form-control {{ $errors->has('company_id') ? 'is_invalid' : '' }}" required>
                <option value="0">Sin Empresa</option>
              </select>
              {!! $errors->first('company_id','<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-4">Tipo Cotización</label>
            <div class="input-group col-sm-8">
              <div class="input-group-addon input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-receipt"></i>
                </div>
              </div>
              <select name="status" id="select1" class="form-control {{ $errors->has('status') ? 'is_invalid' : '' }}" required>
                <option value="0">Factura</option>
              </select>
              {!! $errors->first('status','<div class="invalid-feedback">:message</div>') !!}
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Comprar</button>
        </div>
      </form>
    </div>
  </div>
</div>