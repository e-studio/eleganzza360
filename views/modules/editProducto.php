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

$producto = $_REQUEST['idEditar'];


?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Editar Producto</li>
      </ol>
      
      <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Editar datos del producto</div>
      <div class="card-body">
        <?php
          $respuesta = Datos::buscaProductoModel($producto, "productos");
        ?>
        <form method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Producto</label>
                <input class="form-control" value ="<?php echo $respuesta['nombre'];?>" name ="nombre" id="nombre" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre del producto" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Categoria</label>
                <input class="form-control" value ="<?php echo $respuesta['categoria'];?>" name="categoria" id="categoria" type="text" aria-describedby="nameHelp" placeholder="Categoria" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Precio</label>
            <input class="form-control" value ="<?php echo $respuesta['precio'];?>" name="precio" id="precio" type="text" aria-describedby="nameHelp" placeholder="Precio del producto" required="true">
          </div>
          <input class="btn btn-primary btn-block"  type="submit" value="Actualizar">
          <input type="hidden" id="idProductos" name="idProductos" value="<?php echo $producto; ?>">
       </form>


        <?php

        $ingreso = new MvcController();
        $ingreso -> actualizaProductoController();
        
        ?>
        
      </div>
    </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->