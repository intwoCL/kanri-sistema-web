<div class="modal fade" id="addProduct">
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
        <input type="hidden" name="product_id" id="inputIdProduct">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-form-label col-sm-4">Unidad</label>
            <select class="form-control col-sm-5 ml-3" id="inputQuantity" name="quantity"  onchange="totalNumber()">
              @for($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-4">Precio</label>
            <div class="input-group col-sm-8">
              <div class="input-group-addon input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-dollar-sign"></i>
                </div>
              </div>
              <input type="number" class="form-control" id="inputPrice" name="unit_value" onkeyup="totalNumber()"  placeholder="" min="0" pattern="^[0-9]+" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-4">Total a pagar</label>
            <div class="input-group col-sm-8">
              <div class="input-group-addon input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-dollar-sign"></i>
                </div>
              </div>
              <input type="text" min="0" id="inputTotal" pattern="^[0-9]+" disabled class="form-control" id="inputCode" autocomplete="off" name="total" value="0" placeholder="">
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Añadir</button>
        </div>
      </form>
    </div>
  </div>
</div>