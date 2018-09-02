<?php

if (!isset($_SESSION)){
  session_start();
}

if(!$_SESSION["validar"]){

	header("location:index.php");
	echo $_SESSION["validar"];
	exit();

}

?>
<?php include "navUsuario.php"?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Agregar Cliente</li>
      </ol>
      
      <hr>
      <p>Contenido para agregar clientes.</p>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->