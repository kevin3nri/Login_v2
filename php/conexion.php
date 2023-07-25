<?php

$conexion = mysqli_connect("localhost", "root", "", "db ultima");
/*
if($conexion){
    echo'Conectado exitosamente a la base de datos';
}else{
    echo'No se ha podido conectar a la base de datos';
}
*/

date_default_timezone_set("America/Mexico_City");
$fechahora = date("Y-m-d h:i:s");
?>