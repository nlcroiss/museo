<?php
session_start();


 require_once "conexion.php";



 $sql="SELECT * FROM categorialibro";

 $result=mysqli_query($conex,$sql);

 if (mysqli_num_rows($result)>0){

         
    include "primero.php";


    include('header.php');
                ?>

      
    <section>
     
    <div class="container text-center ">
        <div class="text-center mt-5 mb-3"><h3>Categorias de libros</h3></div>
        <?php if(isset($_GET['mensaje'])) {
                switch ($_GET['mensaje']) {
                    case 'agregado':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Categoria agregada exitosamente'."</strong></div></div>";
                        break;
                    case 'edit':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Categoria modificada exitosamente'."</strong></div></div>";
                        break; 
                    case 'borrado':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Categoria borrada exitosamente'."</strong></div></div>";
                        break;
                }
              }
        ?>
        <table class="table table-striped table-hover">
            <div class="row">
                <div class="col-9"></div>
                    <div class="col-3">
                    <div class="btn btn-primary btn-sm "> <a class="text-decoration-none text-white" href="form-agregar-cat2.php">Agregar</a></div>
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
                    <td><a class="me-3 btn btn-outline-success btn-sm " href="form-edit-cat2.php?id=<?php echo $fila ['idcategorias'];?>">Editar</a>
              
                    <a class="btn btn-outline-danger btn-sm" href="form-eliminar-cate2.php?id=<?php echo $fila ['idcategorias'];?>">Borrar</a></td>

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



