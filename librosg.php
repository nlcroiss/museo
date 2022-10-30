<?php
// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";

 $sql="SELECT * FROM inventariolibros ORDER BY idlibro";

 $result=mysqli_query($conex,$sql);

 if (mysqli_num_rows($result)>0){

         
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Inventario Libros</title>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
 </head>
 
 <body>
     
      
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Listado de Libros</h3></div>
        
        <table class="table table-striped table-hover">


           
                <thead>
                    <tr>
                    <th scope="col">Autor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Fecha de edicion</th>
                    <th scope="col">Lugar</th>
                    <th scope="col">Cantidad de paginas</th>
                    <th scope="col">Modo de adquisicion</th>
                    <th scope="col">Nombre del/la donante</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado</th>

                    </tr>
                </thead>

          
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["autor"]; ?></th>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["editorial"]; ?></td>
                    <td><?php echo $fila["fechaedicion"]; ?></td>
                    <td><?php echo $fila["lugar"]; ?></td>
                    <td><?php echo $fila["paginas"]; ?></td>
                    <td><?php echo $fila["modoadquisicion"]; ?></td>
                    <td><?php echo $fila["nomdonante"]; ?></td>
                    <td><?php echo $fila["fechaingreso"]; ?></td>
                    <td><?php echo $fila["descripcion"]; ?></td>
                    <td><?php echo $fila["procedencia"]; ?></td>
                    <td><?php echo $fila["estado"]; ?></td>
                </tr>
                

            <?php
            }
            ?>         
            
            </tbody>



    </table></div>

   
   <?php
     }else header("location:vacioinventario.php");
   ?>  
    
    </section>    

   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>



