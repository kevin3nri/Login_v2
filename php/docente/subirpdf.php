<?php
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$idins = $_POST['idInscripciones'];
$idstu = $_POST['student'];
$idact = $_POST['idActividad'];

// Verificar si ya existe un archivo PDF para el estudiante y la actividad
$sql_verificar = "SELECT idsubir_doc FROM subir_doc WHERE students_matristu = ? AND Actividad_idActividad = ?";
$stmt_verificar = mysqli_prepare($conexion, $sql_verificar);
mysqli_stmt_bind_param($stmt_verificar, "ii", $idstu, $idact);
mysqli_stmt_execute($stmt_verificar);
mysqli_stmt_store_result($stmt_verificar);

if (mysqli_stmt_num_rows($stmt_verificar) > 0) {
    echo '
    <script>
        alert("Ya tienes un archivo PDF.");
        window.location = "../../docentepdf.php";
    </script>
    ';
} else {
    // Continuar con la lógica de subida de archivos
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        // Obtener el contenido binario del archivo
        $archivo_contenido = file_get_contents($_FILES['archivo']['tmp_name']);
        $archivo_nombre = $_FILES['archivo']['name'];
        $archivo_tipo = $_FILES['archivo']['type'];
        $archivo_peso = $_FILES['archivo']['size'];
        $fechahora = date("Y-m-d h:i:s");
    
        // Preparar una declaración SQL segura para la inserción
        $sql = "INSERT INTO subir_doc (idsubir_doc, subiNombre, subiTipo, subiContenido, subipeso, subiFecha, students_matristu, Actividad_idActividad) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "isssdssi", $idins, $archivo_nombre, $archivo_tipo, $archivo_contenido, $archivo_peso, $fechahora, $idstu, $idact);
    
        if (mysqli_stmt_execute($stmt)) {
            echo '
            <script>
                alert("Archivo Almacenado Exitosamente");
                window.location = "../../docentepdf.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Inténtalo de nuevo, Archivo no almacenado");
                window.location = "../../docentepdf.php";
            </script>
            ';
        }
        
        // Cerrar la conexión y el statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al subir el archivo.";
    }
}
?>