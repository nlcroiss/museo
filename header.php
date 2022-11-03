<header>
     <!-- Encabezado -->       
    <div class="container-fluid encabezado">
        <div class="row">

    
          <div class="col-1 logo">
            <div class="my-3 ms-3">
              <!-- <a href="index.php"><img src="./imagenes/logomuseo.png" alt="logo"  id="img1"></a> -->
        </div>
            </div>
      <div class="col-11">
        
      <h1 class="titulo__texto">Museo Ferroviario</h1>
      <h2 class="titulo__texto">San Cristobal</h2></div>
      </div>
      </div>
      </div>

       <!-- Menú de Navegación -->  
      <nav class="navbar navbar-expand-md navbar-light bg-success">
      <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <?php
          if ( !isset($_SESSION["dniadmin"]) && !isset($_SESSION["dniencargado"]) ) {
        ?>
      <ul class="navbar-nav">
        
      
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house"></i></a>
        </li>

        <li class="nav-item pt-1">
          <a class="nav-link" href="https://www.facebook.com/groups/178208595674717/"><i class="bi bi-facebook"></i></a>
        </li>

        <li class="nav-item pt-1">
          <a class="nav-link" href="inventarioGeneral.php">Inventario</a>
        </li>

       </ul>
        <ul class="navbar-nav ms-auto">

        <li class="nav-item pt-1">
          <a class="nav-link" href="login.php">Administracion</a>
        </li>
        </ul>
        <?php
           }else{ 
            if (isset($_SESSION['dniadmin']) ){
            ?>
        <ul class="navbar-nav">
            <li class="nav-item pt-1">
              <a class="nav-link" href="listado.php">Usuarios</a>
            </li>

            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariomuebles.php">Inventario Muebles</a>
            </li>
            <li class="nav-item pt-1">
              <a class="nav-link" href="categoriaMuebles.php">Categorias Muebles</a>
            </li>
            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariolibros.php">Inventario Libros</a>
            </li>
            <li class="nav-item pt-1">
              <a class="nav-link" href="categoriaLibros.php">Categorias Libros</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">

        
            <div class= "mt-2 text-danger pt-1">
           <span>
              <?php echo $_SESSION["dniadmin"];?>
          </span>
          </div>
      
        <li class="nav-item pt-1">
          <a class="nav-link" href="salir.php">Cerrar sesion</a>
        </li>
        </ul>
        <?php }else{ ?>
          <ul class="navbar-nav">
              <li class="nav-item pt-1">
              <a class="nav-link" href="agregarmuebles.php">Registrar muebles</a>
            </li>	
            <li class="nav-item pt-1">
              <a class="nav-link" href="agregarlibros.php">Registrar libros</a>
            </li>	
            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariomuebles.php">Listado de muebles</a>
            </li>	
            <li class="nav-item pt-1">
              <a class="nav-link" href="inventariolibros.php">Listado de libros</a>
            </li>	
         </ul>
         <ul class="navbar-nav ms-auto">
            <div class= "mt-2 text-danger pt-1">
           <span>
              <?php echo $_SESSION["dniencargado"];?>
          </span>
          </div>
          <li class="nav-item pt-1">
          <a class="nav-link" href="salir.php">Cerrar sesion</a>
        </li>
          </ul>
          <?php
         }}
          ?>
      </div>
      </div>
      </nav>       
</header>
    
    