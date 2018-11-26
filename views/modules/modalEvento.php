<?php 
$lista = new mvcController;
?>
<!-- Modal -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEventoE"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" id="txtIDEvento" name="txtIDEvento">
        <input type="hidden" id="txtFechaEvento" name="txtFechaEvento">
        <input type="hidden" id="cancelado" name="cancelado">
        <div class="form-group">
          <div class="col-sm-10">
            <label>Paciente</label>
            <select name="txtPacienteEvento" id="txtPacienteEvento" class="form-control">
              <?php $lista -> llenaModelos(); ?>
            </select>
            <!-- Paciente: <input type="text" id="txtPacienteEvento" name="txtPacienteEvento" placeholder="Nombre de la paciente" class="form-control" disabled> -->
          </div>
        </div>
        <div class="form-group">
          <label for="txtHoraEvento" class="col-sm-10 control-label">Hora de la cita: </label>
          <div class="input-group clockpicker col-sm-10" data-autoclose="true" data-align="center" data-placement="right">
            <input type="text" id="txtHoraEvento" value="9:00" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <label>Tratamiento</label>
            <select name="txtTratamientoEvento" id="txtTratamientoEvento" class="form-control" required>
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
           <div class="col-sm-10">
            <label>Tratamiento 2</label>
            <select name="txtTratamientoEvento2" id="txtTratamientoEvento2" class="form-control" required>
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
          <div class="col-sm-10">
            <label>Tratamiento 3</label>
            <select name="txtTratamientoEvento3" id="txtTratamientoEvento3" class="form-control" required>
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
          <div class="col-sm-10">
            <label>Tratamiento 4</label>
            <select name="txtTratamientoEvento4" id="txtTratamientoEvento4" class="form-control" required>
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            Atendio: <input type="password" id="txtEmpleadaEvento" name="txtEmpleadaEvento" class="form-control">
          </div>
           <div class="col-sm-10">
            Atendio 2: <input type="password" id="txtEmpleadaEvento2" name="txtEmpleadaEvento2" class="form-control">
          </div>
          <div class="col-sm-10">
            Atendio 3: <input type="password" id="txtEmpleadaEvento3" name="txtEmpleadaEvento3" class="form-control">
          </div>
        </div>
         <div class="form-group">
          <div class="col-sm-10">
            Notas de la Cita: <input type="text" id="txtNotaEvento" name="txtNotaEvento" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnModificar">Atendió</button>
        <button type="button" class="btn btn-danger" id="btnEliminar">Cancelar</button>
        <button type="button" class="btn btn-info" id="btnCambiar">Modificar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>