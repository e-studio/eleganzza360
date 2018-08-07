<?php

session_start();

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
$histo = $_REQUEST['idHis'];

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Historial de Cliente</li>
      </ol>
      
      <hr>
       <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Clientes</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Paciente</th>
                  <th>Tratamiento</th>
                  <th>Fecha</th>
                  <th>Atendida por</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Paciente</th>
                  <th>Tratamiento</th>
                  <th>Fecha</th>
                  <th>Atendida por</th>
                  <th>Total</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  echo $histo;
                  $ingreso = new MvcController();
                  $ingreso -> listaHistorialController($histo);             
                ?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->