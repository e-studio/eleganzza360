<!--============================   alta 1 ======================================-->
<?php

session_start();

if(!$_SESSION["validar"]){

  header("location:index.php");

  exit();


}

include "views/modules/encabezado.php";

?>


<!-- Page Title
    ============================================= -->
    <section id="page-title" class="page-title-mini">

      <div class="container clearfix">
        <h1>ejemplo de formulario de captura</h1>

      </div>

    </section>
<!-- #page-title end -->



<div class="clear"></div> <!--  Limpiamos el renglon -->

<section id="content">
  <div class="content-wrap">
      <div class="container clearfix">
      <div class="clear"></div> <!--  Limpiamos el renglon -->

<div class="col_two_third col_last">
 <form name="alta" id="alta" action="altaAsunto.php" method="post" enctype="multipart/form-data">
  
    <div class=" form-group">
      <label>Nombre: <span class="required">*</span></label>
      <input name="nombre" type="text" required class="form-control" id="nombre" placeholder="Nombre">
    </div>
  
    <div class="col_half">
      <label>Cliente: <span class="required">*</span></label>
      <select name="cliente" required class="form-control" id="categorias">
      <option value="">SELECCIONE...</option>
      <option value= '4'>Cliente Uno</option>                      </select>
    </div>
     <div class="col_half col_last">
      <label>Empresa: <span class="required">*</span></label>
      <select name="empresa" required class="form-control" id="categorias">
      <option value="">SELECCIONE...</option>
      <option value= '1'>Olaf Urbina</option>                      </select>
    </div>
  
    <div class="clear"></div>
  
    <div class="col_half">
      <label>Contraparte: <span class="required">*</span></label>
      <input name="contraparte" type="text" required class="form-control" id="telefono" placeholder="Contraparte">
    </div>
    <div class="col_half col_last">
      <label>N&uacute;mero de Expediente: <span class="required">*</span></label>
      <input name="noExpediente" type="tel" required class="form-control" id="telefono" placeholder="N&uacute;mero de Expediente">
    </div>
    
        
    <div class="clear"></div>
        
     
    <div class=" col_one_third">
      <label>Abogado Responsable: <span class="required">*</span></label>
      <select name="abogado1" required class="form-control" id="categorias">
      <option value="">SELECCIONE...</option>
      SELECT id, nombre, apellidos from usuarios WHERE (nivel=2 OR nivel=1) AND (despacho=1)<option value= '1'>Ricardo Urbina Najera</option><option value= '2'>Arturo Gutierrez Arevalo</option><option value= '5'>Alan Urbina Najera</option><option value= '6'>Fernando Rodriguez</option>                      </select>
    </div>
    
    <div class=" col_one_third">
      <label>Abogado Responsable 2: <span class="required">*</span></label>
      <select name="abogado2"  class="form-control" id="categorias">
      <option value="">SELECCIONE...</option>
      SELECT id, nombre, apellidos from usuarios WHERE (nivel=2 OR nivel=1) AND (despacho=1)<option value= '1'>Ricardo Urbina Najera</option><option value= '2'>Arturo Gutierrez Arevalo</option><option value= '5'>Alan Urbina Najera</option><option value= '6'>Fernando Rodriguez</option>                      </select>
    </div>

     <div class=" col_one_third col_last">
      <label>Abogado Responsable 3: <span class="required">*</span></label>
      <select name="abogado3"  class="form-control" id="categorias">
      <option value="">SELECCIONE...</option>
      SELECT id, nombre, apellidos from usuarios WHERE (nivel=2 OR nivel=1) AND (despacho=1)<option value= '1'>Ricardo Urbina Najera</option><option value= '2'>Arturo Gutierrez Arevalo</option><option value= '5'>Alan Urbina Najera</option><option value= '6'>Fernando Rodriguez</option>                      </select>
    </div>
    <div class=" form-group">
                          </div>
    <div class="form-group">
      
    </div>
    
    <input type="hidden" name="despacho" value="1">

    <div class="buttons-box clearfix">
      <input name="alta" type="submit" value="Grabar">
  	</div>   
  
</form><!-- .form-box -->
</div> <!--col_full -->



</div>
</div>
</section>