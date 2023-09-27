<?php
$conexion = mysqli_connect("localhost", "root", "", "proyecto");
    
    $matristu = $_POST['matricula'];
    $stuClav = md5($_POST['stuClav']);
    
    if (isset($_POST['submit'])){
        $sql = "UPDATE students SET stuClav = ? WHERE matristu = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $stuClav, $matristu);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            echo '
            <script>
                alert("Contraseña Almacenado Exitosamente");
                window.location = "../../alum.php";
            </script>
        ';
        }else{
            echo '
            <script>
                alert("Intentalo de nuevo, Contraseña no Valida");
                window.location = "../../alum.php";
            </script>
        ';
        }
    }
mysqli_close($conexion);
?>