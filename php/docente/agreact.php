<?php
    
    session_start();

    if(!isset($_SESSION['teachNames'])){
        echo '<script>
                alert("Por favor debes iniciar sesión");
                window.location = "index.php";
              </script>';
        session_destroy();
        die();
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = mysqli_connect("localhost", "root", "", "proyecto");

    $idac = $_POST['idActividad'];
    $acti = $_POST['Nombre_Act'];
    $peri = $_POST['periodo'];
    $carre = $_POST['carrera'];
    $matritea = $_SESSION['matritea'];

    $sql = "INSERT INTO actividad (idActividad,actNombre,Periodo_idPeriodo,carrera_idcarrera,teachers_matritea)
     VALUES ('$idac','$acti','$peri','$carre','$matritea')";

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
}