<?php
session_start();

// Conexion a la BD
require_once "conexion.php";


 
 
include ("primero.php");

     
     include('header.php');

   ?>
      
      
      <?php

if (!isset($_GET['msje'])){

  // Guarda el id enviado por parámetro en URL, desde listado.php, y lo evalúa con $_GET
  
   $id=$_GET['id'];
   $_SESSION['ids']=$id;

}
$sql="SELECT * FROM categorialibro WHERE idcategorias = $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
               


       ?>
            
    
   <!-- Index.php contiene un Formulario --> 

   
   
  <section>
   
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2"><h2>Editar categoria de libro</h2></div>	
  
  	
  <form class="row g-3" action="editarcategoria2.php" method="post">
  
 
  <div class="col-sm-12 mb-3">
    <label for="nombre" class="form-label"> Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresar nombre del libro" value="<?php echo $fila['nombre']; ?>" >
  </div>
 
  <div class="col-sm-6 mb-3">
  </div>
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Actualizar</button>
  
  </div>
  
  </form>
   

  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>