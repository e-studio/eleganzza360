<?php 
	if (!isset($_SESSION)){
  session_start();
}
	if(!$_SESSION["validar"]){
		header("location:index.php");
		exit();
	}
 ?>
	<div class="content-wrapper">
    <div class="container-fluid">
    	<?php
    		include "calendario.php";
    		include "footer.php";
    		include "navAdmin.php";
    	?>