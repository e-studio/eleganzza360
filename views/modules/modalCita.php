<?php 
$lista = new mvcController;
?>
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
        <?php $respuesta = Datos::ultimaCitaModel("citas");
        $num = $respuesta['last']+1; ?>
        <input type="hidden" id="ultimacita" name="ultimacita" value="<?php echo $num; ?>">
        <input type="hidden" id="txtID" name="txtID">
        <input type="hidden" id="txtFecha" name="txtFecha">
        <div class="form-group">
          <div class="form-group col-sm-8">
            <label>Paciente:</label>
             <select name="txtPaciente" id="txtPaciente" class="form-control" required>
              <?php $lista -> llenaModelos(); ?>
            </select>
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
            <label>Tratamiento</label>
             <select name="txtTratamiento" id="txtTratamiento" class="form-control" required>
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
        </div>
        <div class="col-sm-10">
            <label>Tratamiento 2</label>
             <select name="txtTratamiento2" id="txtTratamiento2" class="form-control">
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
          <div class="col-sm-10">
            <label>Tratamiento 3</label>
             <select name="txtTratamiento3" id="txtTratamiento3" class="form-control">
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
          <div class="col-sm-10">
            <label>Tratamiento 4</label>
             <select name="txtTratamiento4" id="txtTratamiento4" class="form-control">
              <?php $lista -> llenaModelosProd(); ?>
            </select>
          </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-sm-1"></div>
          <div class="col-sm-5">
            <label>Agendó</label>
            <input class="form-control" type="password" name="agendo" id="agendo" placeholder="Empleada que agenda">
          </div>
          <div class="col-sm-5">
            <label>Referida</label>
            <input class="form-control" type="text" name="referida" id="referida" placeholder="Referida por">
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