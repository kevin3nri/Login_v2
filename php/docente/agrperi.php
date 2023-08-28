<?php
    
    $conexion = mysqli_connect("localhost", "root", "", "proyecto");

    $idpe = $_POST['idPeriodo'];
    $per = $_POST['perPeriodo'];
    
    $sql = "INSERT INTO Periodo (idPeriodo,perPeriodo)
     VALUES ('$idpe','$per')";

    $dato = mysqli_query($conexion, $sql);

    if($dato){
        echo '
        <script>
            alert("Usuario Almacenado Exitosamente");
            window.location = "../../docente.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo, Usuario no almacenado");
            window.location = "../../docente.php";
        </script>
    ';
    }