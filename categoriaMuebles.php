<?php
session_start();


 require_once "conexion.php";



 $sql="SELECT * FROM categoria";

 $result=mysqli_query($conex,$sql);

 if (mysqli_num_rows($result)>0){

         
    include "primero.php";
 

    include('header.php');
        
        ?>

      
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Categorias</h3></div>
        <?php if(isset($_GET['mensaje']) && ($_GET['mensaje']=='ok')){echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Categoria agregada exitosamente'."</strong></div></div>";}?>
        <table class="table table-striped table-hover">
            <div class="row">
                <div class="col-9"></div>
                    <div class="col-3">
                    <div class="btn btn-primary btn-sm "> <a class="text-decoration-none text-white" href="form-agregar-cat.php">Agregar</a></div>
                </div>
            </div>
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Iniciales</th>
            <?php 
            if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])){
            ?>
                    <th scope="col">Acciones</th>
            <?php 
            }
            ?>
                    </tr>
                </thead>

          
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["nombre"]; ?></th>
                    <td><?php echo $fila["iniciales"]; ?></td>

            <?php 
            if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])){
            ?>
                    <td><a class="me-3 btn btn-outline-success btn-sm " href="form-agregar-cat.php?">Editar</a>
                    <h1> </h1>
              
                    <a class="btn btn-outline-danger btn-sm" href="form-eliminar-muebles.php?id=<?php echo $fila ['idmuebles'];?>">Borrar</a></td>

                </tr>
                
            <?php 
            }
            ?>
            <?php
            }
            ?>         
            
            </tbody>



    </table></div>

   
   <?php
     }else header("location:agregarmuebles.php");
   ?>  
    
    </section>    

    <?php

    include('footer.php');

    ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>



