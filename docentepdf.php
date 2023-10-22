<?php

    session_start();
    
    if(!isset($_SESSION['teachNames'])){
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
                <h1>Docente</h1>
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
                <a class="bold-text"><?php echo'Bienvenido(a) '.$_SESSION['teachNames'];?></a>
            </a>
            <a class="navbar-brand">
                <li class="breadcrumb-item active" aria-current="page"><a class="btn btn-primary" href="php/cerra_sesion.php">Cerrar Sesión</a></li>
            </a>
            </div>
        </nav>
    </div>
    <div>
    <nav class="navbar navbar-expand-lg" aria-label="breadcrumb">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="docente.php">Datos Docente</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docentelista.php">Listas de Alumnos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docenteasis.php">Listas de Asistencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docentepdf.php">Subir Archivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docentegenerapdf.php">Genera PDF</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docentehorarioact.php">Horario de Actividades</a>
                    </li>
                </ul>
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">SUBIR ARCHIVOS</a></li>
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
                                        <th>Actividad Complementaria</th>
                                        <th>Tipo de Actividad</th>
                                        <th>Periodo</th>
                                        <th>Matricula</th>
                                        <th>Nombre del Alumno</th>
                                        <th>Apellido del Alumno</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        include ("php/conexion.php");

                                        $sql = "SELECT t.matritea, t.teachNames, a.idActividad, a.actNombre,i.idInscripciones, p.perPeriodo, c.carreNombre, s.matristu, s.stunNames, s.stuLastNames 
                                                FROM teachers t 
                                                INNER JOIN actividad a ON t.matritea = a.teachers_matritea 
                                                INNER JOIN inscripciones i ON a.idActividad = i.Actividad_idActividad 
                                                INNER JOIN students s ON i.students_matristu = s.matristu 
                                                INNER JOIN periodo p ON a.Periodo_idPeriodo = p.idPeriodo 
                                                INNER JOIN carrera c ON a.carrera_idcarrera = c.idcarrera
                                                WHERE t.teachNames = ? ";

                                        $stmt = mysqli_prepare($conexion, $sql);
                                        mysqli_stmt_bind_param($stmt, "s", $_SESSION['teachNames']);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($row['teachNames']) ?></td>
                                        <td><?php echo htmlentities($row['actNombre']) ?></td>
                                        <td><?php echo htmlentities($row['carreNombre']) ?></td>
                                        <td><?php echo htmlentities($row['perPeriodo']) ?></td>
                                        <td><?php echo htmlentities($row['matristu']) ?></td>
                                        <td><?php echo htmlentities($row['stunNames']) ?></td>
                                        <td><?php echo htmlentities($row['stuLastNames']) ?></td>
                                        <td>
                                            <a href="docentesubir.php?idActividad=<?php echo $row['idActividad']?>&matristu=<?php echo $row['matristu']?>">
                                            <button class="btn btn-primary" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                </svg> Subir</button></a>
                                            
                                            <a href="modificar_pdf.php?idActividad=<?php echo $row['idActividad']; ?>&matristu=<?php echo $row['matristu']; ?>">
                                            <button class="btn btn-success" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                </svg> Editar PDF</button></a>
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