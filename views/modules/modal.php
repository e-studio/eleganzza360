<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" id="txtID" name="txtID">
        <input type="text" disabled id="txtFecha" name="txtFecha">
        <div class="form-group">
          <label for="txtPaciente" class="col-sm-2 control-label">Paciente: </label>
          <div class = "col-sm-10">
            <input type="text" id="txtPaciente" name="txtPaciente" placeholder="Nombre de la paciente" class = "form-control" required>
          </div>
        </div>

        <div class = "form-group">
          <label for="txtHora" class="col-sm-10 control-label">Hora de la cita: </label>
          <div class = "input-group clockpicker col-sm-10" data-autoclose = "true" data-align = "center" data-placement = "right">
            <input type="text" id="txtHora" value="9:00" class="form-control">
          </div>  
        </div>

        <div class ="form-group"> 
          <label for="empleada" value ="1" class="col-sm-2 control-label">Atendio: </label>
          <div class = "col-sm-10">
            <input type="text" id="empleada" name="empleada" placeholder="Quien Atendio" class = "form-control" required>
          </div>
        </div>

        <div class = "form-group">
          <label for = "txtTratamiento" class = "col-sm-2 control-label">Tratamientos: </label>
          <div class = "col-sm-10">
            <textarea id="txtTratamiento" rows="3" class="form-control"> </textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
          <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
          <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
        </div>
      </div>
    </div>
  </div>