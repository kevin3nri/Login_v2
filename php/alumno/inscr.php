<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$matristu = $_SESSION['matristu'];
$idAct = $_POST['idActividad'];

// Get the limit for this activity
$sqlGetActivityLimit = "SELECT actlimit FROM actividad WHERE idActividad = ?";
$stmtGetActivityLimit = mysqli_prepare($conexion, $sqlGetActivityLimit);
mysqli_stmt_bind_param($stmtGetActivityLimit, "s", $idAct);
mysqli_stmt_execute($stmtGetActivityLimit);
mysqli_stmt_bind_result($stmtGetActivityLimit, $activityLimit);
mysqli_stmt_fetch($stmtGetActivityLimit);
mysqli_stmt_close($stmtGetActivityLimit);

// Count the number of registrations for this activity
$sqlCountRegistrations = "SELECT COUNT(*) AS totalRegistrations FROM inscripciones WHERE Actividad_idActividad = ?";
$stmtCountRegistrations = mysqli_prepare($conexion, $sqlCountRegistrations);
mysqli_stmt_bind_param($stmtCountRegistrations, "s", $idAct);
mysqli_stmt_execute($stmtCountRegistrations);
mysqli_stmt_bind_result($stmtCountRegistrations, $totalRegistrations);
mysqli_stmt_fetch($stmtCountRegistrations);
mysqli_stmt_close($stmtCountRegistrations);

if ($totalRegistrations >= $activityLimit) {
    // Registration limit has been reached
    echo '
        <script>
            alert("No puedes inscribirte en esta actividad. El límite de inscripción se ha alcanzado.");
            window.location = "../../alumins.php";
        </script>
    ';
} else {
    // The student can register
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