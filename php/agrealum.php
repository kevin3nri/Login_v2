<?php
    
    include ("conexion.php");

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
    

    $sql1 = "INSERT INTO students (matristu, stunNames, stuLastNames, stuSex, stuAge, stuBithDate, stuQual, stuExt, stuInt, stuCol, stuMun, stuEnti, stuPostalCode, stuPhone, stuCare, stuSeme, stuTurn, stuGroup, stuMail, stuUser, stuClav, stuTipe, stuRol, stuFere)
    VALUES ('$matristu', '$names', '$lastname', '$genero', '$edad', '$cump', '$cal', '$lt', '$mz', '$col', '$mun', '$enti', '$postal', '$phone', '$carrera', '$semes', '$turno', '$grupo', '$email', '$user ', '$contrasena', '$tipe', 3 , '$fechahora')";
    
    // verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM students WHERE stuSex='$email'");
 
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../altasalumnos.php";
            </script>
        ';
        exit();
    }

    // verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM students WHERE stuUser ='$user'");
 
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../altasalumnos.php";
            </script>
        ';
        exit();
    }

    $dato = mysqli_query($conexion, $sql1);

    if($dato){
        echo '
        <script>
            alert("Usuario Almacenado Exitosamente");
            window.location = "../altasalumnos.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo, Usuario no almacenado");
            window.location = "../altasalumnos.php";
        </script>
    ';

    }

?>