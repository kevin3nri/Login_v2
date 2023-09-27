<?php
    session_start();

    include ("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST['admMail'];
        $password = md5($_POST['admClue']);
    
        // Escapar los valores de correo y contraseña si es necesario
        $correo = mysqli_real_escape_string($conexion, $correo);
        $password = mysqli_real_escape_string($conexion, $password);
    
        // Consulta para administradores
        $stmt = mysqli_prepare($conexion, "SELECT * FROM admins WHERE admMail = ? AND admClue = ?");
        mysqli_stmt_bind_param($stmt, "ss", $correo, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) > 0) {
            $f2 = mysqli_fetch_assoc($result);
    
            if ($f2['admRol'] == 1) {
                $_SESSION['idadmin'] = $f2['idadmin'];
                $_SESSION['admNames'] = $f2['admNames'];
                $_SESSION['admRol'] = $f2['admRol'];
    
                echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
                echo "<script>location.href='../altadmin.php'</script>";
                exit;
            }
        }
    
        // Consulta para docentes
        $stmt = mysqli_prepare($conexion, "SELECT * FROM teachers WHERE teachMail = ? AND teachClue = ?");
        mysqli_stmt_bind_param($stmt, "ss", $correo, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) > 0) {
            $f2 = mysqli_fetch_assoc($result);
    
            if ($f2['teachRol'] == 2) {
                $_SESSION['matritea'] = $f2['matritea'];
                $_SESSION['teachNames'] = $f2['teachNames'];
                $_SESSION['teachRol'] = $f2['teachRol'];
    
                echo '<script>alert("BIENVENIDO DOCENTE")</script> ';
                echo "<script>location.href='../docente.php'</script>";
                exit;
            }
        }
    
        // Consulta para estudiantes
        $stmt = mysqli_prepare($conexion, "SELECT * FROM students WHERE stuMail = ? AND stuClav = ?");
        mysqli_stmt_bind_param($stmt, "ss", $correo, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) > 0) {
            $f2 = mysqli_fetch_assoc($result);
    
            if ($f2['stuRol'] == 3) {
                $_SESSION['matristu'] = $f2['matristu'];
                $_SESSION['stunNames'] = $f2['stunNames'];
                $_SESSION['stuRol'] = $f2['stuRol'];
    
                echo '<script>alert("BIENVENIDO ESTUDIANTE")</script> ';
                echo "<script>location.href='../alum.php'</script>";
                exit;
            }
        }
    
        // Si no se encontró un usuario válido, mostrar mensaje de error
        echo '
            <script>
                alert("Usuario no existente por favor verifique los datos ingresados");
                window.location = "../index.php";
            </script>
        ';
    }
    exit;
?>