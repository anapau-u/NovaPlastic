<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro de contacto</title>
	<!--     Fonts and icons     -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/analista.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--     CSS Files     -->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-left">
				<form class="login100-form validate-form" action="registropersona-form.php" method="POST">
					<span class="login100-form-title p-b-43">Registro de Contacto</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingresa el Nombre">
						<input class="input100" type="text" name="nombre">
						<span class="focus-input100"></span>
						<span class="label-input100">Nombre</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el Apellido paterno">
						<input class="input100" type="text" name="apaterno">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Paterno</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el Apellido materno">
						<input class="input100" type="text" name="amaterno">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Materno</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa la Fecha de nacimiento">
						<input class="input100" type="date" name="fnacimiento">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Selecciona un Puesto">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="puesto" name="puesto">
							<option value="vacio" selected>Selecciona un Puesto</option>
							<option value="CEO">CEO</option>
							<option value="Contacto">Contacto</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el Teléfono">
						<input class="input100" type="number" name="telefono">
						<span class="focus-input100"></span>
						<span class="label-input100">Teléfono</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el País">
						<input class="input100" type="number" name="pais">
						<span class="focus-input100"></span>
						<span class="label-input100">País</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el Estado">
						<input class="input100" type="number" name="estado">
						<span class="focus-input100"></span>
						<span class="label-input100">Estado</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Selecciona un Municipio">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="municipio" name="municipio">
							<option value="vacio" selected>Selecciona tu Alcaldia</option>
							<option value="AlvaroObregon">Álvaro Obregón</option>
							<option value="Azcapotzalco">Azcapotzalco</option>
							<option value="BenitoJuarez">Benito Juárez</option>
							<option value="Coyoacan">Coyoacán</option>
							<option value="Cuauhtemoc">Cuauhtémoc</option>
							<option value="CuajimalpaDeMorelos">Cuajimalpa de Morelos</option>
							<option value="GustavoAMadero">Gustavo A. Madero</option>
							<option value="Iztacalco">Iztacalco</option>
							<option value="Iztapalapa">Iztapalapa</option>
							<option value="MagdalenaContrera">Magdalena Contreras</option>
							<option value="MiguelHidalgo">Miguel Hidalgo</option>
							<option value="MilpaAlta">Milpa Alta</option>
							<option value="Tlahuac">Tláhuac</option>
							<option value="Tlalpan">Tlalpan</option>
							<option value="VenustianoCarranza">Venustiano Carranza</option>
							<option value="Xochimilco">Xochimilco</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa la Colonia">
						<input class="input100" type="number" name="colonia">
						<span class="focus-input100"></span>
						<span class="label-input100">Colonia</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el número interior">
						<input class="input100" type="number" name="numeroint">
						<span class="focus-input100"></span>
						<span class="label-input100">Número interior</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el número exterior">
						<input class="input100" type="number" name="numeroext">
						<span class="focus-input100"></span>
						<span class="label-input100">Número exterior</span>
					</div>
          
					<div class="wrap-input100 validate-input" data-validate="Ingresa el código postal">
						<input class="input100" type="number" name="codpostal">
						<span class="focus-input100"></span>
						<span class="label-input100">Código Postal</span>
					</div>

					<br><br>
					<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" value="Registrar">
					</div>
					<br>
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1550682290-d071c75759f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80');">
				</div>
			</div>
		</div>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>