<!DOCTYPE php>
<php lang="en">
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
				<form action="php/agrealum.php" method="POST">
					<span class="login100-form-title p-b-26">
						Agregar Alumno
					</span>
                       
                    <div class="wrap-input100 validate-input" data-validate = "matristu">
						<input class="input100" type="text" name="matristu">
                        <span class="focus-input100" data-placeholder="Matricula"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "NAMES">
						<input class="input100" type="text" name="stunNames">
						<span class="focus-input100" data-placeholder="Nombre"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Apellido">
						<input class="input100" type="text" name="stuLastNames">
						<span class="focus-input100" data-placeholder="Apellido"></span>
					</div>

					<div class="wrap-input100 validate-input">Genero
                        <select class="form-select" aria-label="Default select example" name="stuSex">
                                <option value="M">M</option>
                                <option value="F">F</option>  
                        </select>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Age">
						<input class="input100" type="text" name="stuAge">
						<span class="focus-input100" data-placeholder="Edad"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "BithDate">
						<input class="input100" type="date" name="stuBithDate">
						<span class="focus-input100" data-placeholder="cumpleaños"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Qualification">
						<input class="input100" type="text" name="stuQual">
						<span class="focus-input100" data-placeholder="Promedio"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Number Ext">
						<input class="input100" type="text" name="stuExt">
						<span class="focus-input100" data-placeholder="Numero Ext"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Number Int">
						<input class="input100" type="text" name="stuInt">
						<span class="focus-input100" data-placeholder="Numero Int"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "colonia">
						<input class="input100" type="text" name="stuCol">
						<span class="focus-input100" data-placeholder="Colonia"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Municipio">
						<input class="input100" type="text" name="stuMun">
						<span class="focus-input100" data-placeholder="Municipio"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Entidad">
						<input class="input100" type="text" name="stuEnti">
						<span class="focus-input100" data-placeholder="Entidad"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Postalcode">
						<input class="input100" type="text" name="stuPostalCode">
						<span class="focus-input100" data-placeholder="Codigo Postal"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "PHONE">
						<input class="input100" type="phone" name="stuPhone">
						<span class="focus-input100" data-placeholder="Telefono"></span>
					</div>

                    <div class="wrap-input100 validate-input">Carrera
						<select class="form-select" aria-label="Default select example" name="stuCare">
							<option value="Ingeniería Sistemas Computacionales">Ingeniería Sistemas Computacionales</option>
                            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
							<option value="Ingeniería Informática">Ingeniería Informática</option>
                            <option value="Ingeniería Electromecánica">Ingeniería Electromecánica</option>
							<option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
							<option value="Ingeniería Administración">Ingeniería Administración</option>   
                        </select>  
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Semester">
						<input class="input100" type="text" name="stuSeme">
						<span class="focus-input100" data-placeholder="Semestre"></span>
					</div>

                    <div class="wrap-input100 validate-input">Turno
                        <select class="form-select" aria-label="Default select example" name="stuTurn">
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>  
                        </select>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Group">
						<input class="input100" type="text" name="stuGroup">
						<span class="focus-input100" data-placeholder="Grupo"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="stuMail">
						<span class="focus-input100" data-placeholder="Correo"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "USER">
						<input class="input100" type="text" name="stuUser">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="stuClav">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Tipe">
                        <input class="input100" type="text" name="stuTipe">
						<span class="focus-input100" data-placeholder="Tipo"></span>
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
                        <a href="altasalumnos.php">
                        <button class="login100-form-btn">
                            Regresar
                        </button></a>
                    </div>
                </div>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
  
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