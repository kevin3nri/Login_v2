<?php

$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$idDesempenio = $_POST['idDesempenio'];
$Desem = $_POST['Desem'];
$Valor = $_POST['Valor'];
$idActividad = $_POST['idActividad'];
$matristu = $_POST['matristu'];

// Verifica si ya existe un registro para este alumno y actividad
$consulta = "SELECT * FROM desempenio WHERE students_matristu = '$matristu' AND Actividad_idActividad = '$idActividad'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    // El desempeño ya existe para este alumno y actividad
    echo '
    <script>
        alert("El desempeño para este alumno y actividad ya existe. No se permite la duplicación.");
        window.location = "../../docentegenerapdf.php";
    </script>
    ';
} else {
    // No existe un registro, puedes insertarlo
    $sql = "INSERT INTO desempenio (idDesempenio, desenombre, desevalor, Actividad_idActividad, students_matristu)
            VALUES ('$idDesempenio', '$Desem', '$Valor', '$idActividad', '$matristu')";

    $dato = mysqli_query($conexion, $sql);

    if ($dato) {
        echo '
        <script>
            alert("Desempeño del Alumno Almacenado Exitosamente");
            window.location = "../../docentegenerapdf.php";
        </script>
        ';
    } else {
        echo '
        <script>
            alert("Inténtalo de nuevo, Desempeño del Alumno no almacenado");
            window.location = "../../docentegenerapdf.php";
        </script>
        ';
    }
}
?>