<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="E-studio" />

	<!-- Stylesheets
	============================================= -->
	<link rel="stylesheet" href="views/cssSistema/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="views/styleSistema.css" type="text/css" />
	<link rel="stylesheet" href="views/cssSistema/dark.css" type="text/css" />
	<link rel="stylesheet" href="views/cssSistema/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="views/cssSistema/animate.css" type="text/css" />
	<link rel="stylesheet" href="views/cssSistema/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Document Title
	============================================= -->
	<title>Panel de Control</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		

		     	<?php

					$modulos = new Enlaces();
					$modulos -> enlacesController();
				
				?>   	
      						
                
                
        <!-- #content end -->

		<!-- Footer		============================================= -->
		<?php
			include "views/modules/footer.php"
		?>

		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="views/jsSistema/jquery.js"></script>
	<script src="views/js/validarIngreso.js"></script>
    <!--<script type="text/javascript" src="js/plugins.js"></script>-->
	
	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="views/jsSistema/functions.js"></script>

</body>
</html>