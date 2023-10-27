<?php
///verifica la sesion del maestro
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

//realiza la conexion con la base de datos 
    $conexion = mysqli_connect("localhost", "root", "", "proyecto");

    //inserta los datos del formulario
    $idac = $_POST['idActividad'];
    $acti = $_POST['Nombre_Act'];
    $actLimit =$_POST['actLimit'];
    $peri = $_POST['periodo'];
    $carre = $_POST['carrera'];
    $matritea = $_SESSION['matritea'];

    //inserta datos en la base de datos
    $sql = "INSERT INTO actividad (idActividad,actNombre,actLimit,Periodo_idPeriodo,carrera_idcarrera,teachers_matritea)
     VALUES ('$idac','$acti','$actLimit','$peri','$carre','$matritea')";

    $dato = mysqli_query($conexion, $sql);

    if($dato){
        echo '
        <script>
            alert("Actividad Almacenado Exitosamente");
            window.location = "../../docente.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo, Actividad no almacenado");
            window.location = "../../docente.php";
        </script>
    ';
    }
}
?>