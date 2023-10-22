<!DOCTYPE php>
<php lang="es">
<head>
    <title>Editar</title>
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
  
<!--===============================================================================================-->
</head>            
<body>  
	<div class="limiter">
		<div class="container">
			<div class="wrap">
					<span class="login100-form-title p-b-26">
						Grafica de Alumnos Inscritos a la Actividad Complementaria
					</span>
                        <?php
                            include ("php/conexion.php");

                            $idActividad= $_GET['idActividad'];

                            $sql = "SELECT a.idActividad,a.actNombre,t.matritea,t.teachNames,c.idcarrera,c.carreNombre,p.idPeriodo,p.perPeriodo, COUNT(s.stuSex) ,SUM(CASE WHEN s.stuSex = 'F' THEN 1 ELSE 0 END) AS InsAlum_F, SUM(CASE WHEN s.stuSex = 'M' THEN 1 ELSE 0 END) AS InsAlum_M 
                            FROM inscripciones i 
                            INNER JOIN actividad a ON i.Actividad_idActividad = a.idActividad 
                            INNER JOIN teachers t ON a.teachers_matritea = t.matritea 
                            INNER JOIN carrera c ON a.carrera_idcarrera = c.idcarrera 
                            INNER JOIN periodo p ON a.Periodo_idPeriodo = p.idPeriodo 
                            INNER JOIN students s ON i.students_matristu = s.matristu
                            WHERE Actividad_idActividad ='$idActividad'";
                            $result = $conexion->query($sql);
                            $row = $result->fetch_assoc();
                            $conexion->close();  
                        ?>
                    <!--datos de la actividad complementaria que imparte el docente---> 
                    <div class="validate-input" data-validate = "idActividad">
						<input class="input100" type="hidden" name="idActividad" value="<?php echo $_GET['idActividad']; ?>" style="font-weight: bold;">
					</div>

                    <div class="validate-input" data-validate = "carreNombre"> Nombre de la Actividad Complementaria:
						<input class="input100" type="text" name="carreNombre" disabled value="<?php echo $row['actNombre']; ?>" style="font-weight: bold;">
					</div>

                    <div class="validate-input" data-validate = "carreNombre"> Tipo de la Actividad Complementaria:
						<input class="input100" type="text" name="carreNombre" disabled value="<?php echo $row['carreNombre']; ?>" style="font-weight: bold;">
					</div>

                    <div class="validate-input" data-validate = "carreNombre"> Periodo de la Actividad Complementaria:
						<input class="input100" type="text" name="carreNombre" disabled value="<?php echo $row['perPeriodo']; ?>" style="font-weight: bold;">
					</div>

                    <!--datos de la actividad complementaria que imparte el docente donde se visualiza el genero de los Alumnos inscritos---> 
                    Total de Alumnos Inscritos:
                    <input class="input100" type="text" name="stuSex" disabled value="<?php echo $row['InsAlum_F'] + $row['InsAlum_M']; ?>" style="font-weight: bold;"> 

                    <!--grafica de pastel del genero de los alumnos inscritos en la actividad complementaria---> 
                    <div id="chartContainer" style="width: 40%; margin: 0 auto;">
                        <canvas id="pieChart"></canvas>
                    </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
								Guardar
							</button>
						</div>
					</div>

				<div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <a href="docentegrafica.php">
                        <button class="login100-form-btn">
                            Regresar
                        </button></a>
                    </div>
                </div>
			</div>
		</div>
	</div>
  
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Obtén los datos de inscripción (número de hombres y mujeres) de PHP
    var hombres = <?php echo $row['InsAlum_M']; ?>;
    var mujeres = <?php echo $row['InsAlum_F']; ?>;
    
    var ctx = document.getElementById('pieChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Hombres', 'Mujeres'],
            datasets: [{
                data: [hombres, mujeres],
                backgroundColor: ['blue', 'pink']
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Alumnos Inscritos por Género'
            }
        }
    });
});
</script>
</script>
</body>
</php>  