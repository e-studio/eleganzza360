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

$usuario = $_REQUEST['idEditar'];


?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Editar Empleado</li>
      </ol>
      
      <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Editar datos del Empleado</div>
      <div class="card-body">
        <?php
          $respuesta = Datos::buscaEmpleadoModel($usuario, "usuarios");
        ?>
        <form method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Usuario</label>
                <input class="form-control" value ="<?php echo $respuesta['usuario'];?>" name ="usuario" id="usuario" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre de Usuario" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Contraseña</label>
                <input class="form-control" value ="<?php echo $respuesta['password'];?>" name="password" id="password" type="text" aria-describedby="nameHelp" placeholder="Contraseña" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Nombre</label>
            <input class="form-control" value ="<?php echo $respuesta['nombre'];?>" name="nombre" id="nombre" type="text" aria-describedby="emailHelp" placeholder="Nombre" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">E-mail</label>
               <input class="form-control" value ="<?php echo $respuesta['email'];?>" name="email" id="email" type="email" name="email" placeholder="Correo Electronico" required="true">
              </div>
              <div class="col-md-6">
                <label for="celular">Celular</label>
               <input class="form-control" value="<?php echo $respuesta['celular'];?>" name="celular" id="celular" type="phone" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="rol">Permisos :</label>
                <select name="rol" id="rol">
                  <option selected="selected" value="<?php echo $respuesta['rol'];?>"></option>
                  <option value="0">Administrador</option>
                  <option value="1">Usuario</option>
                </select>
              </div>
              <div class="col-md-6">
                
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block"  type="submit" value="Actualizar">
          <input type="hidden" id="id" name="id" value="<?php echo $usuario; ?>">
       </form>


        <?php

        $ingreso = new MvcController();
        $ingreso -> actualizaEmpleadoController();
        
        ?>
        
      </div>
    </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->