<?php

include("conexion.php");


$file_name = $_FILES["archivo"]["name"];
$file_type = $_FILES["archivo"]["type"];
$file_size = $_FILES["archivo"]["size"];

$sql2 = "INSERT INTO subi_doc (idsubi_doc,Nombre,Tipo,Tamaño,Fecha,teachers_matritea) 
VALUES('','$file_name','$file_type','$file_size','$fechahora','')
WHERE idsubi_doc = ''";

$dato = mysqli_query($conexion, $sql2);

if($dato){
    echo '
    <script>
        alert("Datos modificados Exitosamente");
        window.location = "../altasalumnos.php";
    </script>
';
   
    $uploadDirectory = '../docs';
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $allowed_types = array('application/pdf');
    if (!in_array($file_type, $allowed_types)) {
        echo "Error: Solo se permiten archivos PDF.";
        exit;
    }

    $target_directory = "../docs/";
        $target_file = $target_directory . basename($file_name);
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            echo '
            <script>
                alert("Archivo: PDF subido Exitosamente");
                window.location = "../altasalumnos.php";
            </script>
        ';
        }else{
            echo '
            <script>
                alert("Error: al subir pdf");
                window.location = "../altasalumnos.php";
            </script>
        ';
        }

 }else{
        echo '
        <script>
            alert("Datos no modificados");
            window.location = "../altasalumnos.php";
        </script>
    ';

    }

