<?php
    
    include ("conexion.php");

    $idadmin = $_POST['idadmin'];
    $names = $_POST['admNames'];
    $genero = $_POST['admSex'];
    $email = $_POST['admMail'];
    $phone = $_POST['admPhone'];
    $user = $_POST['admUser'];
    $contrasena = md5($_POST['admClue']);
    $ciudad = $_POST['admState'];
    

    $sql1 = "INSERT INTO admins (idadmin, admNames, admSex, admMail, admPhone, admUser, admClue, admRol, admState, admFere)
     VALUES ('$idadmin', '$names', '$genero', '$email', '$phone', '$user', '$contrasena', 1 ,'$ciudad', '$fechahora')";
    
    // verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM admins WHERE admMail='$email'");
 
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../altadmin.php";
            </script>
        ';
        exit();
    }

    // verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM admins WHERE admUser='$user'");
 
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../altadmin.php";
            </script>
        ';
        exit();
    }

    $dato = mysqli_query($conexion, $sql1);

    if($dato){
        echo '
        <script>
            alert("Usuario Almacenado Exitosamente");
            window.location = "../altadmin.php";
        </script>
    ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo, Usuario no almacenado");
            window.location = "../altadmin.php";
        </script>
    ';

    }

?>