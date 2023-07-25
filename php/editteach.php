<?php 

include('conexion.php');
 
if (isset($_POST['submit2'])) {


$matritea = $_POST['matritea'];
$names = $_POST['teachNames'];
$genero = $_POST['teachSex'];
$email = $_POST['teachMail'];
$phone = $_POST['teachPhone'];
$user = $_POST['teachUser'];
$contrasena = md5($_POST['teachClue']);
$ciudad = $_POST['teachState'];

$sql2 = "UPDATE teachers SET teachNames = '$names', teachSex = '$genero', teachMail = '$email', teachPhone = '$phone', teachUser = '$user', teachClue = '$contrasena', teachState = '$ciudad' WHERE matritea = '$matritea'";
    
    $dato = mysqli_query($conexion, $sql2);

    if($dato){
        echo '
        <script>
            alert("Datos modificados Exitosamente");
            window.location = "../altas.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Datos no modificados");
            window.location = "../altas.php";
        </script>
    ';

    }
}
?>