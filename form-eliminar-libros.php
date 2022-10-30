<?php

// Conexion a la Base de Datos Biblioteca 
 
session_start();

require_once "conexion.php";

/* Si no existe mensaje resultante de actualización (Porque aún no hizo actualizacion) */

if (!isset($_GET['msje'])){

  // Guarda el id enviado por parámetro en URL, desde listado.php, y lo evalúa con $_GET

   $id=$_GET['id'];

}else{
    
     // Guarda la Variable de Sesión ids, creada en el archivo editar.php 

     $id=$_SESSION['ids'];
}     

$sql="SELECT * FROM inventariolibros where idlibro= $id";

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
        
?>


<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Formulario Edición Datos</title>
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>


  <?php
    
    include('header.php');

  ?>

  
 <section>
 
 <div class="container mt-2 mb-5">
 <div class="text-center my-5 text-primary"><h2>Eliminar elemento del inventario</h2></div>	
       
 <form class="row g-3" action="eliminar-libros.php" method="post">

 <input type="hidden" class="form-control" name="idlibro" id="idlibro" value="<?php echo $fila['idlibro'];?>">
 <input type="hidden" class="form-control" name="categoria2" id="categoria2" value="<?php echo $fila['categorialibro_idcategorias'];?>">

 <div class="col-sm-6">
    <label for="autor" class="form-label"> Autor</label>
    <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingresar el autor" value="<?php echo $fila['autor']; ?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="nombre" class="form-label"> Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresar nombre del libro" value="<?php echo $fila['nombre']; ?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="editorial" class="form-label"> Editorial</label>
    <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Ingresar editorial" value="<?php echo $fila['editorial']; ?>" disabled>
  </div>
   <div class="col-sm-6 mb-3">
    <label for="fechaedicion" class="form-label"> Fecha de edicion</label>
    <input type="date" class="form-control" name="fechaedicion" id="fechaedicion" placeholder="Ingresar fecha de edicion" value="<?php echo $fila['fechaedicion']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="lugar" class="form-label"> Lugar</label>
    <input type="text" class="form-control" name="lugar" id="lugar" placeholder="Ingresar lugar" value="<?php echo $fila['lugar']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="paginas" class="form-label"> Paginas</label>
    <input type="int" class="form-control" name="paginas" id="paginas" placeholder="Ingresar paginas" value="<?php echo $fila['paginas']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="modoadquisicion" class="form-label"> Modo de adquisicion</label>
    <input type="text" class="form-control" name="modoadquisicion" id="modoadquisicion" placeholder="Ingresar modoa dquisicion" value="<?php echo $fila['modoadquisicion']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="nomdonante" class="form-label"> Nombre del donante</label>
    <input type="text" class="form-control" name="nomdonante" id="nomdonante" placeholder="Ingresar nombre del donante" value="<?php echo $fila['nomdonante']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="fechaingreso " class="form-label"> Fecha de ingreso</label>
    <input type="date" class="form-control" name="fechaingreso " id="fechaingreso " placeholder="Ingresar fecha de ingreso " value="<?php echo $fila['fechaingreso']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="descripcion" class="form-label"> Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingresar descripcion" value="<?php echo $fila['descripcion']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="procedencia" class="form-label"> Procedencia</label>
    <input type="text" class="form-control" name="procedencia" id="procedencia" placeholder="Ingresa tu Correo Electrónico" value="<?php echo $fila['procedencia']; ?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="estado" class="form-label"> Estado de Conservacion</label>
    <input type="text" class="form-control" name="estado" id="estado" placeholder="Ingresa estado" value="<?php echo $fila['estado']; ?>" disabled>
  </div>    

  <div class="col-sm-6 mb-3">
    <label for="categoria" class="form-label"> Categoria</label>
    <input type="text" class="form-control" name="categoria" id="categoria" value="<?php echo $fila['categorialibro_idcategorias']; ?>" disabled>
  </div>  

  <div class="col-sm-6 mb-3">
  

</div>

 
 <div class="col-12 text-center">
    <div> <h5> ¿Estas segur@ que quieres eliminar a este elemento?</h5>
        <br>
 <button type="submit" class="btn btn-danger btn-sm">Confirmar</button>
 <a class="btn btn-success btn-sm ms-2" href="inventariolibros.php" role="button">Cancelar</a>
 </div>
 
 </form>
  

  <?php
   
   // Uso de GET para mostrar Mensaje resultante de la operacion de Actualizacion

   if (isset($_GET["msje"])){

      if($_GET["msje"]!="ok"){

        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["msje"]."</strong><a href='inventariolibros.php' class='text-primary ms-3'>Volver al Listado</a></div></div>"; 
        
      }else{

              
        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>"."Actualización Exitosa!"."</strong><a href='inventariolibros.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
      
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