<?php 
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$idHoras = $_POST['idHoras'];
$horfecha = $_POST['horfecha'];
$horhora_ini = $_POST['horhora_ini'];
$horhora_fin = $_POST['horhora_fin'];
$idActividad = $_POST['idActividad'];

// Consulta para verificar si el horario ya existe en la actividad
$verificarSql = "SELECT idHoras FROM horas WHERE horfecha = ? AND horhoraini = ? AND horhorafin = ? AND Actividad_idActividad = ?";

$verificarStmt = mysqli_prepare($conexion, $verificarSql);
mysqli_stmt_bind_param($verificarStmt, "ssss", $horfecha, $horhora_ini, $horhora_fin, $idActividad);
mysqli_stmt_execute($verificarStmt);
mysqli_stmt_store_result($verificarStmt);

// Si el horario ya existe, no lo insertamos nuevamente
if (mysqli_stmt_num_rows($verificarStmt) > 0) {
    echo '
    <script>
        alert("Este horario ya existe en la actividad complementaria");
        window.location = "../../docentehorarioact.php";
    </script>';
} else {
    // Si el horario no existe, lo insertamos
    $insertSql = "INSERT INTO horas (idHoras,horfecha,horhoraini,horhorafin,Actividad_idActividad)
    VALUES('$idHoras','$horfecha','$horhora_ini','$horhora_fin','$idActividad')";

    $dato = mysqli_query($conexion, $insertSql);

    if($dato){
        echo '
        <script>
            alert("Horario Almacenado Exitosamente");
            window.location = "../../docentehorarioact.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Inténtalo de nuevo, Horario no almacenado");
            window.location = "../../docentehorarioact.php";
        </script>';
    }
}

mysqli_close($conexion);

?>