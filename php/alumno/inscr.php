<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$matristu = $_SESSION['matristu'];
$idAct = $_POST['idActividad'];

// Obtener el total de inscripciones para la actividad
$sqlGetTotalRegistrations = "SELECT COUNT(*) AS totalRegistrations FROM inscripciones WHERE Actividad_idActividad = ?";
$stmtGetTotalRegistrations = mysqli_prepare($conexion, $sqlGetTotalRegistrations);
mysqli_stmt_bind_param($stmtGetTotalRegistrations, "s", $idAct);
mysqli_stmt_execute($stmtGetTotalRegistrations);
mysqli_stmt_bind_result($stmtGetTotalRegistrations, $totalRegistrations);
mysqli_stmt_fetch($stmtGetTotalRegistrations);
mysqli_stmt_close($stmtGetTotalRegistrations);

// Verificar si el estudiante ya está inscrito en la misma actividad
$sqlCheckRegistration = "SELECT COUNT(*) AS existingRegistrations FROM inscripciones WHERE Actividad_idActividad = ? AND students_matristu = ?";
$stmtCheckRegistration = mysqli_prepare($conexion, $sqlCheckRegistration);
mysqli_stmt_bind_param($stmtCheckRegistration, "ss", $idAct, $matristu);
mysqli_stmt_execute($stmtCheckRegistration);
mysqli_stmt_bind_result($stmtCheckRegistration, $existingRegistrations);
mysqli_stmt_fetch($stmtCheckRegistration);
mysqli_stmt_close($stmtCheckRegistration);

if ($existingRegistrations > 0) {
    // El estudiante ya está inscrito en la misma actividad
    echo '
        <script>
            alert("Ya estás inscrito en esta actividad.");
            window.location = "../../alumins.php";
        </script>
    ';
} elseif ($totalRegistrations >= $activityLimit) {
    // Límite de inscripción alcanzado
    echo '
        <script>
            alert("No puedes inscribirte en esta actividad. El límite de inscripción se ha alcanzado.");
            window.location = "../../alumins.php";
        </script>
    ';
} else {
    // El estudiante puede inscribirse
    $sqlInsert = "INSERT INTO inscripciones (InsAlum, Actividad_idActividad, students_matristu) VALUES (1, ?, ?)";
    $stmtInsert = mysqli_prepare($conexion, $sqlInsert);
    mysqli_stmt_bind_param($stmtInsert, "ss", $idAct, $matristu);

    if (mysqli_stmt_execute($stmtInsert)) {
        echo '
            <script>
                alert("Inscripción exitosa");
                window.location = "../../alumins.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Inscripción no ingresada, error");
                window.location = "../../alumins.php";
            </script>
        ';
    }
}

?>