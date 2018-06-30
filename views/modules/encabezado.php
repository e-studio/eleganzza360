<header id="header" class="full-header" data-sticky-class="not-dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

	<!-- Logo============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="../views/img/logoSistema.jpg"><img src="views/img/logoSistema.jpg" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="../views/img/logoSistema.jpg"><img src="views/img/logoSistema.jpg" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

	<!-- Primary Navigation	============================================= -->
					<nav id="primary-menu">
						<?php  
							include "views/modules/menus/menu".$_SESSION["sistema"].$_SESSION["rol"].".php";
						?>
	<!-- Top Cart   ============================================= -->
                      <div id="top-cart">
                      	<p> <?php echo $_SESSION["nombre"]?></p>
                          
                      </div><!-- #top-cart end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header>