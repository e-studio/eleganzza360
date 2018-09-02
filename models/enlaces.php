<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if($enlaces == "inicio" ||
		   $enlaces == "ingreso" ||
		   $enlaces == "addCliente" ||
		   $enlaces == "editCliente" ||
		   $enlaces == "hisCliente" ||
		   $enlaces == "registroUsuario" ||
		   $enlaces == "venta"||
		   $enlaces == "ventaatendida"||
		   $enlaces == "addProducto" ||
		   $enlaces == "productos"||
		   $enlaces == "clientes" ||
		   $enlaces == "cumples" ||
		   $enlaces == "repClientes" ||
		   $enlaces == "editProducto" ||
		   $enlaces == "citas" ||
		   $enlaces == "empleados" ||
		   $enlaces == "editEmpleados" ||
		   $enlaces == "addEmpleado" ||
		   $enlaces == "reimpresion" ||
		   $enlaces == "pdfprint"
		   ){

			$module = "views/modules/".$enlaces.".php";
		}	

		else if($enlaces == "index"){
			$module = "views/modules/login.php";
		}

		else{
			$module = "views/modules/login.php";		
		}
		
		return $module;

	}


}