
<?php
session_start();



// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";
 require_once "paginado.php";
 if (isset($_POST['btnbuscar']) && $_POST['clavebuscada']!=''){
    //si el boton buscar manda algo se ejecuta esto
$clavebusqueda=$_POST['clavebuscada'];

$sql="SELECT * FROM inventariolibros WHERE autor like '%$clavebusqueda%' or nomdonante like '%$clavebusqueda%' or modoadquisicion like '%$clavebusqueda%' and activo=1 ORDER BY idlibro";
//die($sql);

$result=mysqli_query($conex,$sql);
}else{

 $sql="SELECT * FROM inventariolibros where activo=1 ORDER BY idlibro";

 $result=mysqli_query($conex,$sql);
}
 if (mysqli_num_rows($result)>0){

         
    include ("primero.php");
        
        include('header.php');

    ?>
      
    <section>
     
    <div class="container text-center">
        <div class="text-center mt-5 mb-3"><h3>Listado de Libros</h3></div>


        
        <?php 
            if(isset($_GET['mensaje'])){
                switch ($_GET['mensaje']) {
                    case 'agregado':
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Libro agregado exitosamente'."</strong></div></div>";
                        break;
                        case 'borrado':
                            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Libro borrado exitosamente'."</strong></div></div>";
                            break;
                        case 'edit':
                             echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".'Libro modificado exitosamente'."</strong></div></div>";
                        break;
                        case 'noencontrado':
                            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".'Libro no encontrado'."</strong></div></div>";
                       break;
                        }
             }
            ?>

        <table class="table table-striped table-hover">
            <div class="row">
            <div class="row">
                <div class="col-4">
                <form action="inventariolibros.php" method="POST">	
                  	<div class="input-group mt-2">
          					<input type="text" name="clavebuscada" class="form-control" value="<?php if (!empty($_POST['clavebuscada'])){ echo $_POST['clavebuscada']; }?>">
          					<button class="btn btn-outline-secondary btn-sm" type="submit" name="btnbuscar" id="btnbuscar" value="Buscar">Buscar</button>
          			</div>
				</form>

                </div>
                <div class="col-5"></div>
                    <div class="col-3">
                    <div class="btn btn-primary btn-sm "> <a class="text-decoration-none text-white" href="agregarlibros.php">Agregar</a></div>
                </div>
            </div>

           
                <thead>
                    <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Fecha de edicion</th>
                    <!-- <th scope="col">Lugar</th>
                    <th scope="col">Cantidad de paginas</th>
                    <th scope="col">Modo de adquisicion</th>
                    <th scope="col">Nombre del/la donante</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Estado</th> -->
                    <?php 
            if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])){
            ?>
                    <th scope="col">Acciones</th>
            <?php } ?>
                    </tr>
                </thead>

          
            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
                <tr>
                    
                    <th scope="row"><?php echo $fila["codigo"]; ?></th>
                    <td><?php echo $fila["autor"]; ?></td>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["editorial"]; ?></td>
                    <td><?php echo $fila["fechaedicion"]; ?></td>
                    <!-- <td><?php /* echo $fila["lugar"]; ?></td>
                    <td><?php echo $fila["paginas"]; ?></td>
                    <td><?php echo $fila["modoadquisicion"]; ?></td>
                    <td><?php echo $fila["nomdonante"]; ?></td>
                    <td><?php echo $fila["fechaingreso"]; ?></td>
                    <td><?php echo $fila["descripcion"]; ?></td>
                    <td><?php echo $fila["procedencia"]; ?></td>
                    <td><?php echo $fila["estado"]; */?></td> -->
            <?php 
            if (isset($_SESSION['dniadmin']) || isset($_SESSION['dniencargado'])){
            ?>
                    <td><a class="me-3 btn btn-outline-success btn-sm" href="form-edit-libros.php?id=<?php echo $fila ['idlibro'];?>"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>


                    <a class="btn btn-outline-danger btn-sm" href="form-eliminar-libros.php?id=<?php echo $fila ['idlibro'];?>"><i class="fa fa-trash fa-1x" aria-hidden="true"></i>
</a></td>
</tr>
            <?php } ?>
                
                

            <?php
            }
            ?>         
            
            </tbody>



    </table></div>

   <?php
    $nom='inventariolibros';
    $id='idlibro';
    mostrarPaginado($conex, $nom, $id);
     }else header("location:inventariolibros.php?mensaje=noencontrado");
   ?>  
    
    </section>    

    <?php
  

    include('footer.php');

    ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>



