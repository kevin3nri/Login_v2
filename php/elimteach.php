<?php

include ("conexion.php");

if (isset($_POST['submit'])) {

    $matritea = $_POST['matritea'];

    $sql = "DELETE FROM teachers WHERE matritea = '$matritea'";
    $dato = mysqli_query($conexion, $sql);

    if($dato){
        echo '
        <script>
            alert("Datos eliminados Exitosamente");
            window.location = "../altas.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Datos no eliminados");
            window.location = "../altas.php";
        </script>
    ';

    }
}
?>