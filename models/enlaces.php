<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if($enlaces == "inicio" ||
		   $enlaces == "ingreso" ||
		   $enlaces == "addCliente" ||
		   $enlaces == "editCliente" ||
		   $enlaces == "hisCliente" ||
		   $enlaces == "registroUsuario" ||
		   $enlaces == "vacio"||
		   $enlaces == "addProducto" ||
		   $enlaces == "productos"||
		   $enlaces == "clientes" ||
		   $enlaces == "editProducto" ||
		   $enlaces == "citas" ||
		   $enlaces == "empleados" ||
		   $enlaces == "editEmpleados" ||
		   $enlaces == "addEmpleado"
		   //$enlaces == "perfil" ||
		   //$enlaces == "salir")
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