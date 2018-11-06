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
        <li class="breadcrumb-item active">Reporte de Clientes</li>
      </ol>

      <hr>


       <!-- Aqui va el contenido -->

       <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Ingresos de este mes por cliente</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $ingreso = new MvcController();
                  $ingreso -> ingresosMesClientesController();
                ?>
              </tbody>
             <!-- <tfoot>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Total</th>
                </tr>
              </tfoot>-->
            </table>
          </div>
        </div>

      </div>

      <div><p><hr></p></div>

       <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Total de Ingresos por cliente</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Total</th>
                </tr>
              </thead>
              <!--<tfoot>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Total</th>
                </tr>
              </tfoot>-->

              <tbody>
                <?php
                  $ingreso = new MvcController();
                  $ingreso -> ingresosClientesController();
                ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>


       <!-- Fin del contenido -->

      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->