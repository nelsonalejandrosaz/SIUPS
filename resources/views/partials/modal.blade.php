<div class="modal modal-danger fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">¿Seguro?</h4>
        </div>
        <div class="modal-body">
          <p>Desea eliminar de este Servicio Social al alumno con carnet: </p><p id="carnet"></p>
          <form id="formEliminar" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-outline" id="btnEliminar">Eliminar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->