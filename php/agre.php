<?php
    
    include ("conexion.php");

    $matritea = $_POST['matritea'];
    $names = $_POST['teachNames'];
    $genero = $_POST['teachSex'];
    $email = $_POST['teachMail'];
    $phone = $_POST['teachPhone'];
    $user = $_POST['teachUser'];
    $contrasena = md5($_POST['teachClue']);
    $ciudad = $_POST['teachState'];
    

    $sql = "INSERT INTO teachers (matritea, teachNames, teachSex, teachMail, teachPhone, teachUser, teachClue, teachRol, teachState, teachFere)
     VALUES ('$matritea', '$names', '$genero', '$email', '$phone', '$user', '$contrasena', 2 ,'$ciudad', '$fechahora')";
    
    // verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM teachers WHERE teachMail='$email'");
 
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../altas.php";
            </script>
        ';
        exit();
    }

    // verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM teachers WHERE teachUser='$user'");
 
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../altas.php";
            </script>
        ';
        exit();
    }

    $dato = mysqli_query($conexion, $sql);

    if($dato){
        echo '
        <script>
            alert("Usuario Almacenado Exitosamente");
            window.location = "../altas.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo, Usuario no almacenado");
            window.location = "../altas.php";
        </script>
    ';
    }



    $sql2 ="INSERT INTO actividad (idActividad, Nombre_Act, Periodo_idPeriodo, carrera_idcarrera)
    VALUES ('$idac','$acti','$idp','$idca')";
     
    $sql3 ="INSERT INTO periodo (idPeriodo, Periodo)
    VALUES ('$idp', '$period')";

    $sql4 ="INSERT INTO carrera (idcarrera, Nombre)
    VALUES ('$idca','$carre')";
?>