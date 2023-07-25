<?php

include ("conexion.php");

if (isset($_POST['submit'])) {

    $idamin = $_POST['idadmin'];

    $sql = "DELETE FROM admins WHERE idadmin = '$idamin'";
    $dato = mysqli_query($conexion, $sql);

    if($dato){
        echo '
        <script>
            alert("Datos eliminados Exitosamente");
            window.location = "../altadmin.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Datos no eliminados");
            window.location = "../altadmin.php";
        </script>
    ';

    }
}
?>