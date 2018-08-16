<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php?action=inicio">Eleganzza 360</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="clientes">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseClientes" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Clientes</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseClientes">
            <li>
              <a href="index.php?action=clientes">Clientes</a>
            </li>
            <li>
              <a href="index.php?action=addCliente">Agregar Cliente</a>
            </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="productos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProductos" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Productos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProductos">
            <li>
              <a href="index.php?action=productos">Productos</a>
            </li>
            <li>
              <a href="index.php?action=addProducto">Agregar Producto</a>
            </li>
            
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="index.php?action=venta">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Punto de Venta</span>
          </a>
        </li>
        
        </ul>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item" >
          <a class="nav-link">
            <i ></i><span class="nav-link-text"><?php echo $_SESSION["nombre"]?></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>


    </div>
  </nav>

  <!-- end navigation -->