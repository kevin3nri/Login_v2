<?php 
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$horfecha = $_POST['horfecha'];
$horhora_ini = $_POST['horhora_ini'];
$horhora_fin = $_POST['horhora_fin'];
$idActividad = $_POST['idActividad'];

//actualiza las hora de la actividad complementaria
$updateSql = "UPDATE horas SET horfecha = ?, horhoraini = ?, horhorafin = ? WHERE Actividad_idActividad = ?";

$updateStmt = mysqli_prepare($conexion, $updateSql);
mysqli_stmt_bind_param($updateStmt, "ssss", $horfecha, $horhora_ini, $horhora_fin, $idActividad);
mysqli_stmt_execute($updateStmt);

if (mysqli_affected_rows($conexion) > 0) {
    echo '
    <script>
        alert("Horario Actualizado Exitosamente");
        window.location = "../../docentehorarioact.php";
    </script>';
} else {
    echo '
    <script>
        alert("El horario que intentas actualizar no existe en la actividad complementaria");
        window.location = "../../docentehorarioact.php";
    </script>';
}

mysqli_close($conexion);

?>