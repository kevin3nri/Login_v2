<?php 

include('conexion.php');
 
if (isset($_POST['submit'])) {

$matristu = $_POST['matristu'];
$names = $_POST['stunNames'];
$lastname = $_POST['stuLastNames'];
$genero = $_POST['stuSex'];
$edad = $_POST['stuAge'];
$cump= $_POST['stuBithDate'];
$cal= $_POST['stuQual'];
$lt= $_POST['stuExt'];
$mz= $_POST['stuInt'];
$col= $_POST['stuCol'];
$mun= $_POST['stuMun'];
$enti= $_POST['stuEnti'];
$postal= $_POST['stuPostalCode'];
$phone = $_POST['stuPhone'];
$carrera= $_POST['stuCare'];
$semes= $_POST['stuSeme'];
$turno= $_POST['stuTurn'];
$grupo= $_POST['stuGroup'];
$email = $_POST['stuMail'];
$user = $_POST['stuUser'];
$contrasena = md5($_POST['stuClav']);
$tipe = $_POST['stuTipe'];

$sql2 = "UPDATE students SET matristu = '$matristu',stunNames = '$names',stuLastNames = '$lastname',stuSex='$genero',stuAge='$edad',stuBithDate='$cump',stuQual='$cal',stuExt='$lt',
stuInt='$mz',stuCol='$col',stuMun='$mun',stuEnti='$enti',stuPostalCode='$postal',stuPhone='$phone',stuCare='$carrera',stuSeme='$semes',
stuTurn='$turno',stuGroup='$grupo',stuMail='$email',stuUser='$user',stuClav='$contrasena',stuTipe='$tipe' WHERE matristu = '$matristu'";
    
    $dato = mysqli_query($conexion, $sql2);

    if($dato){
        echo '
        <script>
            alert("Datos modificados Exitosamente");
            window.location = "../altasalumnos.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Datos no modificados");
            window.location = "../altasalumnos.php";
        </script>
    ';

    }
}
?>