<?php 

$conexion = mysqli_connect("localhost", "root", "", "proyecto");

if (isset($_GET['idActividad'])) {
    $idActividad = $_GET['idActividad'];

    $sql = "SELECT subiNombre, subiTipo, subiContenido FROM subir_doc WHERE Actividad_idActividad = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idActividad);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $subiNombre, $subiTipo, $subiContenido);
        mysqli_stmt_fetch($stmt);

        // Configurar las cabeceras para la descarga
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=$subiNombre");

        // Enviar el contenido del archivo
        echo $subiContenido;

        // Cerrar la conexión
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        exit; // Termina la ejecución después de la descarga del archivo.
    } else {
        echo "Archivo no encontrado.";
    }
} else {
    echo "ID de actividad no proporcionado.";
}
?>