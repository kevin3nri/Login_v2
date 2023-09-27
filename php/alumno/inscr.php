<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$idIns = $_POST['idInscripciones'];
$idAct = $_POST['idActividad'];
$matristu = $_SESSION['matristu'];

$sql = "INSERT INTO inscripciones (idInscripciones, InsAlum, InsLimit, Actividad_idActividad, students_matristu)
VALUES (?, 1, 0, ?, ?)";

//verifica que el alumno inscrito no se repita en la base de datos
$verificar_ins = mysqli_query($conexion, "SELECT * FROM inscripciones WHERE students_matristu = '$matristu'");
 
if(mysqli_num_rows($verificar_ins) > 0){
    echo '
       <script>
            alert("Este usuario ya esta inscrito en un curso");
            window.location = "../../alumins.php";
        </script>
    ';
   exit();
}

//verifica que la actividad no se repita en la base de datos
$verificar_ins = mysqli_query($conexion, "SELECT * FROM inscripciones WHERE Actividad_idActividad = '$idAct'");
 
if(mysqli_num_rows($verificar_ins) > 0){
    echo '
       <script>
            alert("Este usuario ya esta inscrito en un curso");
            window.location = "../../alumins.php";
        </script>
    ';
   exit();
}

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "sss", $idIns, $idAct, $matristu);
$dato = mysqli_stmt_execute($stmt);

    if($dato){
        echo '
        <script>
            alert("Inscripcion exitosa");
            window.location = "../../alumins.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Error al realizar la incripcion");
            window.location = "../../alumins.php";
        </script>
    ';
    }
?>