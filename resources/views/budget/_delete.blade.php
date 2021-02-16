<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" id="formDelete">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <input type="hidden" id="inputDeleteId" name="id">
          <input type="hidden" id="inputDeleteData" name="data">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>
