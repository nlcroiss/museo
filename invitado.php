<?php

session_start();

// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";

 $sql="SELECT * FROM Socios ORDER BY idsocio";

 $result=mysqli_query($conex,$sql);

 if (mysqli_num_rows($result)>0){

         
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Listado de Datos Personales</title>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

 </head>
 
 <body>
     
    <?php
        
        include('header.php');

    ?>
      
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Listado de Socios</h3></div>
        
        <table class="table table-striped table-hover">
            <div class="row">
                <div class="col-9"></div>
                    <div class="col-3">
                    
                </div>
            </div>

            <thead>
                <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                
                </tr>
            </thead>
        
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["dni"]; ?></th>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["apellido"]; ?></td>
                    <td><?php echo $fila["email"]; ?></td>
                    

                </tr>
                

            <?php
            }
            ?>         
            
            </tbody>



    </table></div>

   
   <?php
     }
   ?>  
    
    </section>    

    <?php

    include('footer.php');

    ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>