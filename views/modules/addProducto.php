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

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Aregar Producto</li>
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
                <input class="form-control" name ="nombre" id="nombre" type="text" aria-describedby="nameHelp" placeholder="Nombre del Producto" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Categoria</label>
                <input class="form-control" name="categoria" id="categoria" type="text" aria-describedby="nameHelp" placeholder="Categoria" required="true">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">

                <label>Precio $
                <input type="number" placeholder="0.00" required name="precio" id="precio" min="0" value="0" step="0.5" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
                "></label>
            </div>
            <div class="col-md-6">
              <label>Paquete $
                <input type="number" placeholder="0.00" required name="paquete" id="paquete" min="0" value="0" step="0.5" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
                "></label>
<!--              <input type="checkbox" id="paquete" value="0"> <label for="paquete">Se vende en paquete tambien</label>
-->            </div>
            </div>
          </div>
      
          <input class="btn btn-primary btn-block" type="submit" value="Registrar">
       </form>

       <?php
        $ingreso = new MvcController();
        $ingreso -> registroProductosController();
        
        ?>
      </div>
    </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->