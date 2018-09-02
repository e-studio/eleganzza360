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
        <li class="breadcrumb-item active">Agregar Cliente</li>
      </ol>
      
      <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro de Usuarios</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Nombre</label>
                <input class="form-control" name ="nombres" id="nombres" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Apellidos</label>
                <input class="form-control" name="apellidos" id="apellidos" type="text" aria-describedby="nameHelp" placeholder="Apellidos" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Correo Electrónico" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">Telefono Local</label>
               <input class="form-control" name="telLocal" id="telLocal" type="tel" name="telefono" requiered>
              </div>
              <div class="col-md-6">
                <label for="celular">Celular</label>
                <input class="form-control" name="celular" id="celular" type="tel" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Direccion</label>
            <input class="form-control" name="direccion" id="direccion" type="text" aria-describedby="emailHelp" placeholder="Direccion" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">Fecha de Nacimiento</label>
               <input class="form-control" name="fechaNac" id="fechaNac" type="date" name="fechaNac">
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Registrar">
       </form>


        <?php
        $ingreso = new MvcController();
        $ingreso -> registroClientesController();
        
        ?>
        
      </div>
    </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->