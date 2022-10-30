<?php

function contar_registros($conex){

   $sql="SELECT count(idusuario) AS cantidad_total FROM usuarios";
   $result=mysqli_query($conex,$sql);
   $fila=mysqli_fetch_assoc($result);
   return $fila['cantidad_total'];
}




function registros_porpagina($conex,$pag){

    $sql="SELECT * FROM usuarios LIMIT ".($pag*2).",2";
    $result=mysqli_query($conex,$sql);
    return $result;
}

function cantidadpaginas($conex,$can){
    

}


?>