<?php
session_start();

// Conexion a la BD
require_once "conexion.php";
$sql="SELECT * FROM categoria";
$result=mysqli_query($conex,$sql);



    include "primero.php";
     
    include('header.php');

   ?>
      
            
    
   <!-- Index.php contiene un Formulario --> 
   
   
   
  <section>
   
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2"><h2>Agregar Muebles</h2></div>	
  
  	
  <form class="row g-3" action="insertardatosmuebles.php" method="post">
  
  <div class="col-sm-6">
    <label for="designacion" class="form-label">Designacion</label>
    <input type="text" class="form-control" name="designacion" id="designacion" placeholder="Ingresar designacion" required>
  </div>

<div class="col-sm-6 mb-3">
  <label for="modoadquisicion" class="form-label">Modo de adquisicion</label>
    <select class="form-control" name="modoadquisicion" id="modoadquisicion" required>
      <option value="">Selecciona una opcion</option>
      <option value="Donacion">Donacion</option>
    </select>
  </div> 
  
  <div class="col-sm-6 mb-3">
    <label for="nomdonante" class="form-label"> Nombre de Donante</label>
    <input type="text" class="form-control" name="nomdonante" id="nomdonante" placeholder="Ingresa tu telefono">
  </div>
  
   <div class="col-sm-6 mb-3">
    <label for="fechaing" class="form-label">Fecha de Ingreso</label>
    <input type="date" class="form-control" name="fechaing" id="fechaing" required>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="datodescr" class="form-label">Datos Descriptivos</label>
    <input type="text" class="form-control" name="datodescr" id="datodescr" placeholder="Escribe aqui" required>
  </div>

  <div class="col-sm-6 mb-3">
  <label for="procedencia" class="form-label">Procedencia</label>
  <input type="text" class="form-control" name="procedencia" id="procedencia" placeholder="Escribe aqui" required>
  </div> 

  <div class="col-sm-6 mb-3">
  <label for="estadoconserv" class="form-label">Estado de Conservacion</label>
    <select class="form-control" name="estadoconserv" id="estadoconserv" required>
      <option value="">Selecciona una opcion</option>
      <option value="Excelente">Excelente</option>
      <option value="Buen estado">Buen estado</option>
      <option value="Mal estado">Mal estado</option>
    </select>
  </div> 

  
  <div class="col-sm-6 mb-3">
  <label for="categoriaboss" class="form-label">Categoria</label>
    <select class="form-control" name="categoriaboss" id="categoriaboss" required>
      <option value="">Selecciona una opcion</option>
      <?php while($fila=mysqli_fetch_array($result)){ ?>
            <option <?php /* desactivamos la categoria libro */ if($fila['idcategoriaboss']==2) {echo "disabled";}?> value="<?php echo $fila['idcategoriaboss']?>"><?php echo $fila['nombre']?></option>
      <?php 
      }
      ?>
    </select>
  </div> 
  
  <div class="col-sm-6 mb-3">
  

</div>
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="" id="">Enviar</button>
  
  </div>
  
  </form>
   
    
  <?php
    
    // Uso de GET para mostrar Mensaje resultante 

    if (isset($_GET["mensaje"])){

    	 if($_GET["mensaje"]!="ok"){

         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
         
       }else{

        $tiempo_espera = 3;
         header("refresh: $tiempo_espera; url=http://localhost/proyectomuseo/inventariomuebles.php");
         
         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>";  
       
       }  
  } 
  ?> 
  



  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>