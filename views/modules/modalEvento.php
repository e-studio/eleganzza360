<?php 
$serv="localhost";
$bd="sistema";
$user="root";
$pass="";
$link = mysqli_connect($serv, $user, $pass, $bd) ?>
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
        <div class="form-group">
          <div class="col-sm-10">
            Paciente: <input type="text" id="txtPacienteEvento" name="txtPacienteEvento" placeholder="Nombre de la paciente" class="form-control" disabled>
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
            <?php $con = $link -> query("SELECT nombre as 'nombre' FROM productos ORDER BY nombre"); ?>
            <select name="txtTratamientoEvento" id="txtTratamientoEvento" class="form-control" onChange="txtTratamientoEvento(this.value);">
              <option></option>
              <?php while ($rw = $con -> fetch_object()){
                echo "<option value='".$rw->nombre."'>".$rw->nombre."</option>";
              } ?>
            </select> <!--<input type="text" id="txtTratamiento" name="txtTratamiento" class="form-control">-->
            <?php $link=NULL; ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            Atendio: <input type="text" id="txtEmpleadaEvento" name="txtEmpleadaEvento" class="form-control">
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
        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>