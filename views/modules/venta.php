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
/* Connect To Database*/
  require_once ("models/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("models/conexionv.php");//Contiene funcion que conecta a la base de datos
  $query_perfil=mysqli_query($con,"select * from perfil where id=1");
  $rw=mysqli_fetch_assoc($query_perfil);
  $sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from presupuestos order by id desc limit 0,1 ");
  $rws=mysqli_fetch_array($sql);
  $numero=$rws['last']+1;

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Punto de venta</li>
      </ol>
      
      <hr>
      <!-- Aqui va el contenido -->
      
       <form class="form-horizontal" role="form" id="datos_presupuesto" method="post">
        <div id="print-area">
                  <div class="row pad-top font-big">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <a href="" target="_blank">  <img src="views/img/eleganzzaLogo.png" alt="Eleganzza 360 Spa" /></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong>E-mail : </strong> <?php echo $rw['email'];?>
                    <br />
                    <strong>Teléfono :</strong> <?php echo $rw['telefono'];?> <br />
          <strong>Sitio web :</strong> <?php echo $rw['web'];?> 
                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong><?php echo $rw['nombre_comercial'];?>  </strong>
                    <br />
                    Dirección : <?php echo $rw['direccion'];?> 
                </div>

            </div>
          
            
            

            <div class="row ">
      <hr />
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2>Detalles del cliente :</h2>
                     <select class="cliente form-control" name="cliente" id="cliente" required>
            <option value="">Selecciona el cliente</option>
          </select>
                    <span id="direccion"></span>
                    <h4><strong>E-mail: </strong><span id="email"></span></h4>
                    <h4><strong>Teléfono: </strong><span id="telefono"></span></h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2>Detalles del tratamiento :</h2>
                    <h4><strong>Tratamiento #: </strong><?php echo $numero;?></h4>
                    <h4><strong>Fecha: </strong> <?php echo date("d/m/Y");?></h4>
                    <h4><span id="test" hidden></span></h4>
                    <!-- -->
                
                    <textarea  class="form-control" id="descripcion" name="descripcion"  required placeholder="Ingresa la descripción del proyecto" ></textarea>
                    
                  
                </div>
            </div>
            
         
            <div class="row">
      <hr />
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped  table-hover">
                            <thead>
                                <tr>
                                    <th class='text-center'>Item</th>
                  <th>Descripción</th>
                  <th class='text-center'>Cantidad</th>
                                    <th class='text-right'>Precio unitario</th>
                                    <th class='text-right'>Total</th>
                  <th class='text-right'></th>
                                </tr>
                            </thead>
                            <tbody class='items'>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
           
           
            
    
        </div>
       <div class="row"> <hr /></div>
        <div class="row pad-bottom  pull-right">
    
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success ">Guardar presupuesto</button>
             
              

                
            </div>
        </div>
    </form>
    </div>
  <form class="form-horizontal" name="guardar_item" id="guardar_item">
      <!-- Modal -->
      <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Nuevo Ítem</h4>
          </div>
          <div class="modal-body">
          
            <div class="row">
            <div class="col-md-12">
              <label>Descripción del producto/servicio</label>
              <textarea class="form-control" id="descripcionm" name="descripcionm" required></textarea>
              <input type="hidden" class="form-control" id="action" name="action"  value="ajax">
            </div>
            
            </div>

            <div class="row">
            <div class="col-md-6">
              <label>Cantidad</label>
              <input type="text" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            
            <div class="col-md-6">
              <label>Precio unitario</label>
              <input type="text" class="form-control" id="precio" name="precio" required>
            </div>
            
            </div>
        
          
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-info" >Guardar</button>
          
          </div>
        </div>
        </div>
      </div>
  </form>
  <script type="text/javascript">
  $(document).ready(function() {
    $( ".cliente" ).select2({        
    ajax: {
        url: "views/ajax/clientes_json.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 2
}).on('change', function (e){
    var email = $('.cliente').select2('data')[0].email;
    var telefono = $('.cliente').select2('data')[0].telefono;
    var direccion = $('.cliente').select2('data')[0].direccion;
    var test = $('.cliente').select2('data')[0].text;
    $('#email').html(email);
    $('#telefono').html(telefono);
    $('#direccion').html(direccion);
    $('#test').html(test);
})
});

  function mostrar_items(){
    var parametros={"action":"ajax"};
    $.ajax({
      url:'views/ajax/items.php',
      data: parametros,
       beforeSend: function(objeto){
       $('.items').html('Cargando...');
      },
      success:function(data){
        $(".items").html(data).fadeIn('slow');
    }
    })
  }
  function eliminar_item(id){
    $.ajax({
      type: "GET",
      url: "views/ajax/items.php",
      data: "action=ajax&id="+id,
       beforeSend: function(objeto){
         $('.items').html('Cargando...');
        },
      success: function(data){
        $(".items").html(data).fadeIn('slow');
      }
    });
  }
  
  $( "#guardar_item" ).submit(function( event ) {
    parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url:'views/ajax/items.php',
      data: parametros,
       beforeSend: function(objeto){
         $('.items').html('Cargando...');
        },
      success:function(data){
        $(".items").html(data).fadeIn('slow');
        $("#myModal").modal('hide');
        $("#descripcionm").val("");
        $("#precio").val("");
        $("#cantidad").val("");
      }
    })
    
    event.preventDefault();
  })
  $("#datos_presupuesto").submit(function(){
      var cliente = $("#cliente").val();
      var descripcion = $("#descripcion").val();
      var nombre = $("#test").text();
     
      
      if (cliente>0)
     {
      VentanaCentrada('views/pdf/documentos/presupuesto.php?cliente='+cliente+'&descripcion='+descripcion+'&nombre='+nombre,'Presupuesto','','1024','768','true');  
     } else {
       alert("Selecciona el cliente");
       return false;
     }
     
   });
    

    mostrar_items();
    
    
</script>

      <!-- Fin del contenido -->
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->