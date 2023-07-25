<!DOCTYPE php>
<php lang="en">
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
                <h1>Alumnos</h1>
            <a class="navbar-brand">
                <img src="images/tescha1.jpg" class="rounded float-end" alt="imagen" height="80" width="280" ></img>
            </a>
            <a class="navbar-brand">
                <img src="images/informatica.png" class="rounded float-end" alt="imagen" height="80" width="280" ></img>
            </a>
             <li class="breadcrumb-item active" aria-current="page"><a href="php/cerra_sesion.php">CERRAR SESIÓN</a></li>
            </div>
        </nav>
    </div>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="altadmin.php">ADMINISTRADOR</a></li>
                <li class="breadcrumb-item"><a href="altas.php">DOCENTES</a></li>
                <li class="breadcrumb-item active" aria-current="page">ALUMNOS</a></li>
               
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
                             <div class="center"> 
                                <a href="agregalum.php">
                                    <button type="button" class="btn btn-success" type="submit" name="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>Agregar</button></a>
                            </div>
                        <tr>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Genero</th>
                                <th>Edad</th>
                                <th>Cumpleaños</th>
                                <th>Promedio</th>
                                <th>Numero Ext</th>
                                <th>Numero Int</th>
                                <th>Colonia</th>
                                <th>Municipio</th>
                                <th>Entidad</th>
                                <th>Codigo Postal</th>
                                <th>Telefono</th>
                                <th>Carrera</th>
                                <th>Semestre</th>
                                <th>Turno</th>
                                <th>Grupo</th>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Tipo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                include ("php/conexion.php");

                                $sql = "SELECT * FROM students";
                                $result = mysqli_query($conexion,$sql);

                                while($row = mysqli_fetch_array($result)){

                            ?>
                            <tr>
                                <td><?php echo $row['matristu'] ?></td>
                                <td><?php echo $row['stunNames'] ?></td>
                                <td><?php echo $row['stuLastNames'] ?></td>
                                <td><?php echo $row['stuSex'] ?></td>
                                <td><?php echo $row['stuAge'] ?></td>
                                <td><?php echo $row['stuBithDate'] ?></td>
                                <td><?php echo $row['stuQual'] ?></td>
                                <td><?php echo $row['stuExt'] ?></td>
                                <td><?php echo $row['stuInt'] ?></td>
                                <td><?php echo $row['stuCol'] ?></td>
                                <td><?php echo $row['stuMun'] ?></td>
                                <td><?php echo $row['stuEnti'] ?></td>
                                <td><?php echo $row['stuPostalCode'] ?></td>
                                <td><?php echo $row['stuPhone'] ?></td>
                                <td><?php echo $row['stuCare'] ?></td>
                                <td><?php echo $row['stuSeme'] ?></td>
                                <td><?php echo $row['stuTurn'] ?></td>
                                <td><?php echo $row['stuGroup'] ?></td>
                                <td><?php echo $row['stuMail'] ?></td>
                                <td><?php echo $row['stuUser'] ?></td>
                                <td><?php echo $row['stuClav'] ?></td>
                                <td><?php echo $row['stuTipe'] ?></td>
                                <td>
                                    <a href="editalum.php?matristu=<?php echo $row['matristu']?>">
                                    <button type="button" class="btn btn-primary" type="submit" name="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>Editar</button></a>
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