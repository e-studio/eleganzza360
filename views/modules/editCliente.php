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

$cliente = $_REQUEST['idEditar'];


?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Editar Cliente</li>
      </ol>
      
      <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Editar datos de cliente</div>
      <div class="card-body">
        <?php
          $respuesta = Datos::buscaClienteModel($cliente, "clientes");
        ?>
        <form method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Nombre</label>
                <input class="form-control" value ="<?php echo $respuesta['nombres'];?>" name ="nombres" id="nombres" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Apellidos</label>
                <input class="form-control" value ="<?php echo $respuesta['apellidos'];?>" name="apellidos" id="apellidos" type="text" aria-describedby="nameHelp" placeholder="Apellidos" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" value ="<?php echo $respuesta['email'];?>" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Correo Electrónico" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">Telefono Local</label>
               <input class="form-control" value ="<?php echo $respuesta['telefono'];?>" name="telLocal" id="telLocal" type="tel" name="telefono" requiered>
              </div>
              <div class="col-md-6">
                <label for="celular">Celular</label>
                <input class="form-control" value ="<?php echo $respuesta['movil'];?>" name="celular" id="celular" type="tel" required="true">
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block"  type="submit" value="Actualizar">
          <input type="hidden" id="id" name="id" value="<?php echo $cliente; ?>">
       </form>


        <?php

        $ingreso = new MvcController();
        $ingreso -> actualizaClienteController();
        
        ?>
        
      </div>
    </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->