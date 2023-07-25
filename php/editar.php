<?php 

include('conexion.php');
 
if (isset($_POST['submit'])) {

$idadmin = $_POST['idadmin'];
$names = $_POST['admNames'];
$genero = $_POST['admSex'];
$email = $_POST['admMail'];
$phone = $_POST['admPhone'];
$user = $_POST['admUser'];
$contrasena = md5($_POST['admClue']);
$ciudad = $_POST['admState'];

$sql2 = "UPDATE admins SET admNames = '$names', admSex = '$genero', admMail = '$email', admPhone = '$phone', admUser = '$user', admClue = '$contrasena', admState = '$ciudad' WHERE idadmin = '$idadmin'";
    
    $dato = mysqli_query($conexion, $sql2);

    if($dato){
        echo '
        <script>
            alert("Datos modificados Exitosamente");
            window.location = "../altadmin.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Datos no modificados");
            window.location = "../altadmin.php";
        </script>
    ';

    }
}
?>