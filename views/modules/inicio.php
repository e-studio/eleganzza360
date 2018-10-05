<?php
if (!isset($_SESSION)){
  session_start();
}
if(!$_SESSION["validar"]){
	header("location:index.php");
	exit();
}

if ($_SESSION["rol"] > 0){
  //  ==========================             Pantalla de usuario normal =======================================
    include "navUsuario.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- <p>Aqui va el contenido de inicio para Usuarios.</p> -->
      <?php include "calendario.php" ?>

      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->

<?php
include "views/modules/footer.php";
}
else {
      //  ========= Pantalla de Administrador    =======================================

 include "navAdmin.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Inicio</a>
        </li>
      </ol>
      <!-- end Breadcrumbs-->

      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-area-chart"></i> Movimientos por Mes</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">-</div>
      </div>

      <div class="row">

        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Cantidades por Mes</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$80,693</div>
                  <div class="small text-muted">Mes más productivo</div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">-</div>
          </div>
        </div>

        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i>Citas Atendidas</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted"><span id="mesPie"></span></div>
          </div>
          <!-- Example Notifications Card-->
        </div>
      </div>
    </div><!-- /.container-fluid-->

<?php include "views/modules/footer.php";} ?>

  <!-- end navigation -->