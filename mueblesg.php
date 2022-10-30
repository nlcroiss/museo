<?php
// Conexion a la Base de Datos Biblioteca 

require_once "conexion.php";

 $sql="SELECT * FROM inventariomuebles  where activo=1 ORDER BY idmuebles";

 $result=mysqli_query($conex,$sql);

 if (mysqli_num_rows($result)>0){
include("primero.php");
         
 ?>

 
 
  
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Listado de muebles</h3></div>
        
        <table class="table table-striped table-hover">

           
                <thead>
                    <tr>
                    <th scope="col">Designacion</th>
                    <th scope="col">Modo de Adquisicion</th>
                    <th scope="col">Nombre de Donante</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Dato Descriptivo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado de Consevacion</th>
                    </tr>
                </thead>

          
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["designacion"]; ?></th>
                    <td><?php echo $fila["modoadquisicion"]; ?></td>
                    <td><?php echo $fila["nomdonante"]; ?></td>
                    <td><?php echo $fila["fechaing"]; ?></td>
                    <td><?php echo $fila["datodescr"]; ?></td>
                    <td><?php echo $fila["procedencia"]; ?></td>
                    <td><?php echo $fila["estadoconserv"]; ?></td>
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



