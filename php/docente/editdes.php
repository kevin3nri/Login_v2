<?php
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

$idDesempenio = $_POST['idDesempenio']; // Cambia $_POST a $_GET
$Desem = $_POST['Desem'];
$Valor = $_POST['Valor'];
$idActividad = $_POST['idActividad'];
$matristu = $_POST['matristu'];

$sql = "UPDATE desempenio SET desenombre = '$Desem', desevalor = '$Valor', Actividad_idActividad = '$idActividad', students_matristu = '$matristu' WHERE idDesempenio ='$idDesempenio'";

$dato = mysqli_query($conexion, $sql);

if($dato){
    echo '
    <script>
        alert("Desempeño del Alumno Almacenado Exitosamente");
        window.location = "../../docentegenerapdf.php";
    </script>
';
}else{
    echo '
    <script>
        alert("Intentalo de nuevo, Desempeño del Alumno no almacenado");
        window.location = "../../docentegenerapdf.php";
    </script>
';
}
?>