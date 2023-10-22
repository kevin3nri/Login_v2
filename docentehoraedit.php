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
				<form action="php/docente/horedit.php" method="POST">
					<span class="login100-form-title p-b-26">
						Editar Horario de Actividad Complementaria
					</span>
                    <?php
                            include ("php/conexion.php");

                            $idact =$_GET['idActividad'];
                            $sql = "SELECT * FROM horas WHERE Actividad_idActividad = '$idact'";
                            $result = $conexion->query($sql);
                            $row = $result->fetch_assoc();
                            $conexion->close();  
                        ?>

                    <div class="validate-input" data-validate = "idHoras">
						<input class="input100" type="hidden" name="idHoras" value="<?php echo $row['idHoras']; ?>">
                    </div>

					<div class="wrap-input100 validate-input" data-validate = "horfecha">
						<input class="input100" type="date" name="horfecha" value="<?php echo $row['horfecha']; ?>">
						<span class="focus-input100" data-placeholder="Fecha"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "horhora_ini">
						<input class="input100" type="time" name="horhora_ini" value="<?php echo $row['horhoraini']; ?>">
						<span class="focus-input100" data-placeholder="Hora Inicio"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "horhora_fin">
						<input class="input100" type="time" name="horhora_fin" value="<?php echo $row['horhorafin']; ?>">
						<span class="focus-input100" data-placeholder="Hora Final"></span>
					</div>

                    <div class="validate-input" data-validate = "idActividad">
						<input class="input100" type="hidden" name="idActividad" value="<?php echo $_GET['idActividad']; ?>">
                    </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
								Guardar
							</button>
						</div>
					</div>
				</form>

				<div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <a href="docentehorarioact.php">
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

</script>
</body>
</php>  