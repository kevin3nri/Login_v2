<?php

    session_start();
    
    if(!isset($_SESSION['stunNames'])){
        echo'
            <script>
                alert("Por favor debes iniciar sesión");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }
  
?>

<!DOCTYPE php>
<php lang="es">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">      
        
<!--===============================================================================================-->	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<!--===============================================================================================-->
</head>            
<body>  
    <!-- ======= Header ======= -->
    <div>
        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <h1>Alumno</h1>
            <a class="navbar-brand">
                <img src="images/tescha1.jpg" class="rounded float-end" alt="imagen" height="80" width="280" ></img>
            </a>
            <a class="navbar-brand">
                <img src="images/informatica.png" class="rounded float-end" alt="imagen" height="80" width="280" ></img>
            </a>
            <style>
                .bold-text {
                    font-weight: bold;
                }
            </style>
            <a class="navbar-brand">
                <a class="bold-text"><?php echo'Bienvenido(a) '.$_SESSION['stunNames'];?></a>
            </a>
            <a class="navbar-brand">
                <li class="breadcrumb-item active" aria-current="page"><a class="btn btn-primary" href="php/cerra_sesion.php">Cerrar Sesión</a></li>
            </a>
            </div>
        </nav>
    </div>
    <div class="text-right">
        <nav class="navbar navbar-expand-lg" aria-label="breadcrumb">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="alum.php">Actividades Complementarias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alumins.php">Inscripciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alumhorario.php">Horarios</a>
                    </li>
                </ul>
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">HORARIOS</a></li>
            </ol>
        </nav>
    </div>
        <!-- End Page Title -->
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table id="example" class="table table-success border-dark table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Docente</th>
                                        <th>Tipo de Actividad</th>
                                        <th>Actividad Complementaria</th>
                                        <th>Periodo</th>
                                        <th>Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <a href="cambio.php?$_SESSION['stunNames']=<?php echo $_SESSION['stunNames'];?>">
                                            <button type="button" class="btn btn-success" type="submit" name="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>Cambiar Contraseña</button></a>
                                    <?php
                                        include ("php/conexion.php");

                                        $sql = "SELECT s.matristu, s.stunNames, t.teachNames, a.idActividad, a.actNombre, p.perPeriodo, c.carreNombre, u.subiNombre 
                                        FROM students s 
                                        INNER JOIN subir_doc u ON s.matristu = u.students_matristu 
                                        INNER JOIN actividad a ON u.Actividad_idActividad = a.idActividad 
                                        INNER JOIN teachers t ON a.teachers_matritea = t.matritea 
                                        INNER JOIN carrera c ON a.carrera_idcarrera = c.idcarrera 
                                        INNER JOIN periodo p ON a.Periodo_idPeriodo = p.idPeriodo
                                        WHERE s.stunNames = ?";

                                        $stmt = mysqli_prepare($conexion, $sql);
                                        mysqli_stmt_bind_param($stmt, "s", $_SESSION['stunNames']);
                                        mysqli_stmt_execute($stmt);
                                        
                                        $result = mysqli_stmt_get_result($stmt);

                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['stunNames']) ?></td>
                                            <td><?php echo htmlentities($row['teachNames']) ?></td>
                                            <td><?php echo htmlentities($row['carreNombre']) ?></td>
                                            <td><?php echo htmlentities($row['actNombre']) ?></td>
                                            <td><?php echo htmlentities($row['perPeriodo']) ?></td>
                                            <td>
                                                <a href="php/alumno/descargapdf.php?idActividad=<?php echo $row['idActividad']?>"> 
                                                <button class="btn btn-warning" form="from1" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                </svg> Descargar</button>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<!-- End #main -->
    <!-- ======= Footer ======= -->
<br>    
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                <h3>Tecnológico de Estudios Superiores de Chalco</h3>
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <br><strong>Dirección: </strong>Carretera Federal México Cuautla s/n, La Candelaria Tlapala, Chalco, Edo. de México <br>
                    </div>
                    <div class="col-lg-3 col-md-6 ">
                        <br><strong>Telefono: </strong>(0155) 59823503, 59823504, 59820848 y 59821089 <br>
                    </div>
                    <div class="col-lg-3 col-md-6 ">
                        <br><strong>Correo: </strong>teschalco@hotmail.com depto.controlescolar@tesch.edu.mx <br>
                    </div>
                    <div class="col-lg-3 col-md-6 ">
                        <img src="images/tescha2.jpg" alt="imagen" height="190" width="230">
                    </div>
                    <center>
                        <p>kevin enrique @ 2023 | TESCHA-Ingeniería Informática</p>
                    </center>
                </div>
            </div>
        </div>
    </footer>
</br>
    <!-- End Footer -->
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
   <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
   <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<!--===============================================================================================-->
<script>
    new DataTable('#example', {
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-MX.json',
        },
    });
</script>
</body>
</php>   