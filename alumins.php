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
                <li class="breadcrumb-item active" aria-current="page">Inscripciones</a></li>
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
                                        <th>Docente</th>
                                        <th>Nombre de la Actividad</th>
                                        <th>Periodo</th>
                                        <th>Limite de alumnos Permitidos</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include("php/conexion.php");
                                        $sql = "SELECT t.matritea, t.teachNames, a.idActividad, a.actNombre, a.actLimit, p.perPeriodo 
                                                FROM teachers t 
                                                INNER JOIN actividad a ON t.matritea = a.teachers_matritea  
                                                INNER JOIN periodo p ON a.Periodo_idPeriodo = p.idPeriodo";

                                        $stmt = mysqli_prepare($conexion, $sql);
                                        mysqli_stmt_execute($stmt);

                                        $result = mysqli_stmt_get_result($stmt);

                                        while ($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($row['teachNames']) ?></td>
                                        <td><?php echo htmlentities($row['actNombre']) ?></td>
                                        <td><?php echo htmlentities($row['perPeriodo']) ?></td>
                                        <td><?php echo htmlentities($row['actLimit']) ?></td>
                                        <td>
                                            <form action="php/alumno/inscr.php" method="POST">
                                                <input type="hidden" name="idInscripciones">
                                                <input type="hidden" name="idActividad" value="<?php echo htmlentities($row['idActividad']) ?>">
                                                <input type="hidden" name="matristu">
                                                <button type="submit" class="btn btn-warning" name="submit">Inscribirse</button>
                                            </form>
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