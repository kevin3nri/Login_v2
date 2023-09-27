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
				<form action="php/elimteach.php" method="POST">
					<span class="login100-form-title p-b-26">
						Eliminar
					</span>
                        <?php
                            include ("php/conexion.php");

                            $matritea= $_GET['matritea'];
                            $sql = "SELECT * FROM teachers WHERE matritea ='$matritea'";
                            $result = $conexion->query($sql);
                            $row = $result->fetch_assoc();
                            $conexion->close();  
                        ?>

                    <div class="validate-input " data-validate = "matritea">
						<input class="input100" type="hidden" name="matritea" value="<?php echo $row['matritea']; ?>">
                    </div>
                    
					<div class="wrap-input100 validate-input" data-validate = "NAMES">Nombre
						<input class="input100" type="text" name="teachNames" disabled value="<?php echo $row['teachNames']; ?>">
						<span data-placeholder="Names"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "GENERO">Genero
						<input class="input100" type="text" name="teachSex" disabled value="<?php echo $row['teachSex']; ?>">
						<span data-placeholder="Sex"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">Correo
						<input class="input100" type="text" name="teachMail" disabled value="<?php echo $row['teachMail']; ?>">
						<span data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "PHONE">Telefono
						<input class="input100" type="phone" name="teachPhone" disabled value="<?php echo $row['teachPhone']; ?>">
						<span data-placeholder="Phone"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "USER">Usuario
						<input class="input100" type="text" name="teachUser" disabled value="<?php echo $row['teachUser']; ?>">
						<span data-placeholder="User"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">Password
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="teachClue" disabled value="<?php echo $row['teachClue']; ?>">
						<span data-placeholder="Clue"></span>
					</div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit" name="submit">
                                Eliminar
                            </button>
                        </div>
				    </div>
				</form>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <a href="altas.php">
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