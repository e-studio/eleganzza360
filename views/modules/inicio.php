<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php");

	exit();


}

include "views/modules/encabezado.php";

?>

<!--============================   INICIO ======================================-->

<!--====  Fin de INICIO  ====-->