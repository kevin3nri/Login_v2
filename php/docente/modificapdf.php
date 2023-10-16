<?php
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$idins = $_POST['idInscripciones'];
$idstu = $_POST['student'];
$idact = $_POST['idActividad'];

// Recuperar el archivo PDF anterior
$sql_select = "SELECT subiContenido FROM subir_doc WHERE students_matristu = ? AND Actividad_idActividad = ?";
$stmt_select = mysqli_prepare($conexion, $sql_select);
mysqli_stmt_bind_param($stmt_select, "ss", $idstu, $idact);
mysqli_stmt_execute($stmt_select);
mysqli_stmt_store_result($stmt_select);

// Si se encuentra un archivo anterior, eliminarlo
if (mysqli_stmt_num_rows($stmt_select) > 0) {
    $sql_delete = "DELETE FROM subir_doc WHERE students_matristu = ? AND Actividad_idActividad = ?";
    $stmt_delete = mysqli_prepare($conexion, $sql_delete);
    mysqli_stmt_bind_param($stmt_delete, "ss", $idstu, $idact);
    mysqli_stmt_execute($stmt_delete);
}

if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    // Obtener el contenido binario del nuevo archivo
    $archivo_contenido = file_get_contents($_FILES['archivo']['tmp_name']);
    $archivo_nombre = $_FILES['archivo']['name'];
    $archivo_tipo = $_FILES['archivo']['type'];
    $archivo_peso = $_FILES['archivo']['size'];
    $fechahora = date("Y-m-d h:i:s");

    // Preparar una declaración SQL segura para la inserción del nuevo archivo
    $sql_insert = "INSERT INTO subir_doc (idsubir_doc, subiNombre, subiTipo, subiContenido, subipeso, subiFecha, students_matristu, Actividad_idActividad) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt_insert = mysqli_prepare($conexion, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "isssdssi", $idins, $archivo_nombre, $archivo_tipo, $archivo_contenido, $archivo_peso, $fechahora, $idstu, $idact);

    if (mysqli_stmt_execute($stmt_insert)) {
        echo '
        <script>
            alert("Archivo Actualizado Exitosamente");
            window.location = "../../docentepdf.php";
        </script>
        ';
    } else {
        echo '
        <script>
            alert("Intentalo de nuevo, Archivo no actualizado");
            window.location = "../../docentepdf.php";
        </script>
        ';
    }
    
    // Cerrar la conexión y el statement
    mysqli_stmt_close($stmt_insert);
} else {
    echo "Error al subir el archivo.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>