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
            <a class="navbar-brand">
                <a><?php echo'Bienvenido '.$_SESSION['stunNames'];?></a>
            </a>
            <a class="navbar-brand">
                <li class="breadcrumb-item active" aria-current="page"><a class="btn btn-primary" href="php/cerra_sesion.php">CERRAR SESIÓN</a></li>
            </a>
            </div>
        </nav>
    </div>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">ALUMNO</a></li>
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
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Genero</th>
                                <th>Telefono</th>
                                <th>Carrera</th>
                                <th>Semestre</th>
                                <th>Turno</th>
                                <th>Grupo</th>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Docente</th>
                                <th>Tipo de Actividad</th>
                                <th>Actividad Complementaria</th>
                                <th>Periodo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include ("php/conexion.php");

                                $sql = "SELECT s.matristu,s.stunNames,s.stuLastNames,s.stuSex,s.stuPhone,s.stuCare,s.stuSeme,s.stuTurn,s.stuGroup,s.stuMail,s.stuUser,s.stuClav,t.teachNames,a.actNombre,p.perPeriodo,c.carreNombre 
                                FROM students s
                                INNER JOIN teachers t 
                                INNER JOIN actividad a ON a.teachers_matritea = t.matritea   
                                INNER JOIN periodo p ON a.Periodo_idPeriodo = p.idPeriodo 
                                INNER JOIN carrera c ON a.carrera_idcarrera = c.idcarrera
                                WHERE s.stunNames = ?";

                                $stmt = mysqli_prepare($conexion, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $_SESSION['stunNames']);
                                mysqli_stmt_execute($stmt);
                                
                                $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <tr>
                            <td><?php echo htmlentities($row['matristu']) ?></td>
                            <td><?php echo htmlentities($row['stunNames']) ?></td>
                            <td><?php echo htmlentities($row['stuLastNames']) ?></td>
                            <td><?php echo htmlentities($row['stuSex']) ?></td>
                            <td><?php echo htmlentities($row['stuPhone']) ?></td>
                            <td><?php echo htmlentities($row['stuCare']) ?></td>
                            <td><?php echo htmlentities($row['stuSeme']) ?></td>
                            <td><?php echo htmlentities($row['stuTurn']) ?></td>
                            <td><?php echo htmlentities($row['stuGroup']) ?></td>
                            <td><?php echo htmlentities($row['stuMail']) ?></td>
                            <td><?php echo htmlentities($row['stuUser']) ?></td>
                            <td><?php echo htmlentities($row['stuClav']) ?></td>
                            <td><?php echo htmlentities($row['teachNames']) ?></td>
                            <td><?php echo htmlentities($row['carreNombre']) ?></td>
                            <td><?php echo htmlentities($row['actNombre']) ?></td>
                            <td><?php echo htmlentities($row['perPeriodo']) ?></td>
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
                        <p>kevin enrique, Monse Cabadilla @ 2023 | TESCHA-Ingeniería Informática</p>
                    </center>
                </div>
            </div>
        </div>
    </footer>
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