<?php 
$serv="localhost";
$bd="sistema2";
$user="root";
$pass="";
$link = mysqli_connect($serv, $user, $pass, $bd) ?>
<!-- Modal -->
<div class="modal fade" id="ModalCitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento">Agregar Nueva Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" id="txtID" name="txtID">
        <input type="hidden" id="txtFecha" name="txtFecha">
        <div class="form-group">
          <div class="form-group col-sm-8">
            
            <label>Paciente:</label>
            <?php $consulta = $link -> query("SELECT id AS 'id', nombres AS 'nombre', apellidos AS 'apellido' FROM clientes ORDER BY nombres"); ?>
            <select name="txtPaciente" id="txtPaciente" class="form-control" onChange="txtPaciente(this.value);">
              <option value="">Selecciona Paciente:</option>
              <?php while ($row = $consulta -> fetch_object()){
                echo "<option value='".$row->nombre." ".$row->apellido."'>".$row->nombre." ".$row->apellido."</option>";
              }  ?>
            </select>
            <?php $link = NULL; ?>
            
           
        
            <!-- Paciente: <input type="text" id="txtPaciente" name="txtPaciente" placeholder="Nombre de la paciente" class="form-control"> -->
          </div>
        </div>
        <div class="form-group">
          <label for="txtHora" class="col-sm-4 control-label">Hora de la cita: </label>
          <div class="input-group clockpicker col-sm-10" data-autoclose="true" data-align="left" data-placement="right">
            <input type="text" id="txtHora" value="9:00" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            Tratamiento: <input type="text" id="txtTratamiento" name="txtTratamiento" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnAgregar">Agregar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>