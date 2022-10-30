<?php
  session_start();
 
 if (!isset($_SESSION["dniencargado"]) && !isset($_SESSION["dniadmin"])){
         header("Location:index.php");      
 }elseif (isset($_SESSION["dniencargado"])){
        header("Location:inicio_encargado.php"); 
 } 
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del ADMINISTRADOR</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
 
   <?php
     
     include('header.php');

   ?>
      
            
    
   <!-- Este Archivo Contiene la Bienvenida al BEDEL --> 

   
   
  <section>
   

  <div class="container"> 
    <div class="card bg-white border-secondary mt-5 mb-5">  
    <div class="jumbotron">
    <div class="row cont_img_accesoerror mt-2 mb-5"> 

      <div class="text-center lead mt-5 mb-5"><h3><strong>ACCESO EXCLUSIVO PARA ADMINISTRADOR</strong></h3>
     
     <div class='text-center lead mt-5 mb-5'><h3><strong>BIENVENIDO/A AL PANEL DEL ADMINISTRADOR!!!</strong></h3> </div>  
   

  </section>


  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>