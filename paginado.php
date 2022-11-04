<?php
     require_once "fpaginado.php";

//recibimos en la variables "nom"  el nombre de la tabla y en la variable "id" el nombre del campo ID de la tabla
//esto es para saber la tabla que necesita el paginado
    function mostrarPaginado($conex, $nom, $tipoid){
        $itemxpag=0;
        $i=0;
     $cantmax=contar_registros($conex, $nom, $tipoid);

     if (!isset($_GET['pg'])){
        $pag=0;
        $result=registros_porpagina($conex,$nom,$pag); 
    }else{
        $pag=$_GET['pg'];
        $result=registros_porpagina($conex,$nom,$pag);
    } 

    echo" <div>
                    <ul class='pagination justify-content-center'>
                <?php
                $itemxpag=$cantmax/2;
                for ($i = 0; $i < $itemxpag; $i++) { ?>
                    <li class='page-item'><?php echo '<a class='page-link' href='inventariolibros.php?pg='.$i.''>'; echo $i+1;}?></a></li>
                </ul> 
            </div>  ";
                }
?>
