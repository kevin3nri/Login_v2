<?php
    session_start();

    include ("conexion.php");
        
    $correo = $_POST['admMail'];
    $password = $_POST['admClue'];
    
    $validar_login = mysqli_query($conexion, "SELECT * FROM admins WHERE admMail='$correo' and admClue= '$password'");

    if($f2 = mysqli_fetch_assoc($validar_login)){
        $_SESSION['idadmin'] = $f2['idadmin'];
        $_SESSION['admNames'] = $f2['admNames'];
        $_SESSION['admRol'] = $f2['admRol'];

        if($f2['admRol']==1){
            echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
            echo "<script>location.href='../altadmin.php'</script>";
                }
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existente por favor verifique los datos introducidos");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
?>