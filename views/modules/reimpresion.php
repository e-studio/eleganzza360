<?php
if (!isset($_SESSION)){
  session_start();
}

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
        <li class="breadcrumb-item active">Listado de Notas</li>
      </ol>
      
      <hr>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Notas de venta</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>fecha</th>
                  <th>Cliente</th>
                  <th>descripcion</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>id</th>
                  <th>fecha</th>
                  <th>Cliente</th>
                  <th>descripcion</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $ingreso = new MvcController();
                  $ingreso -> listaNotasController();
                ?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 10px;"></div>
    </div><!-- /.container-fluid-->