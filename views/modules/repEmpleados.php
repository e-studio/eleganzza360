<?php
if(!$_SESSION["validar"]){

	header("location:index.php");
	echo $_SESSION["validar"];
	exit();

}
if ($_SESSION["rol"] > 0){
 include "navUsuario.php";
}
else {
  include "navAdmin.php";
}


?>
  <div class="content-wrapper">
    <div class="container-fluid">
      
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Descripcion de la ubicacion</li>
      </ol>
      
      <hr>
       

       <!-- Aqui va el contenido -->

       <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Reporte de Empleados</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">Fecha de Inicio</label>
               <input class="form-control" name="fechaInicio" id="fechaInicio" type="date">
              </div>
              <div class="col-md-6">
                <label for="telLocal">Fecha de Fin</label>
               <input class="form-control" name="fechaFin" id="fechaFin" type="date">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="rol">Comisiones por:</label>
                <select name="tipoComision" id="tipoComision">
                  <option value="">Selecione ...</option>
                  <option value="1">Agendo</option>
                  <option value="2">Atendio</option>
                  <option value="3">Referirio</option>
                </select>
              </div>
            
            </div>
          </div>
      
          <input class="btn btn-primary btn-block" type="submit" value="Generar Reporte">
       </form>
     </div>
   </div>
     <hr>


       
                <?php
                  $ingreso = new MvcController();
                  $ingreso -> comisionesController();                
                ?>
              

        
      


       <!-- Fin del contenido -->
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->