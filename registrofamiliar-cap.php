<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro de familiar</title>
	<!--     Fonts and icons     -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/director.png"/>
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
				<form class="login100-form validate-form" action="registrofamiliar-form.php" method="post">
					<span class="login100-form-title p-b-43">Registro de familiar</span>

					<div class="wrap-input100 validate-input" data-validate="Inserta un Nombre">
						<input class="input100" type="text" name="nombre">
						<span class="focus-input100"></span>
						<span class="label-input100">Nombre</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Inserta un Apellido Paterno">
						<input class="input100" type="text" name="apaterno">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Paterno</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Inserta un Apellido Materno">
						<input class="input100" type="text" name="amaterno">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Materno</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Inserta una Fecha">
						<input class="input100" type="date" name="fnacimiento">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Selecciona un Parentesco">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="parentesco" name="parentesco">
							<option value="vacio" selected>Selecciona un Parentesco</option>
							<option value="1">Cónyuge</option>
							<option value="2">Padre</option>
							<option value="3">Madre</option>
						</select>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Selecciona al familiar titular">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="ipersona" name="ipersona">
							<option value="vacio" selected>Selecciona al familiar titular</option>
							<option value="1">CEO de Empresa 1</option>
							<option value="2">CEO de Empresa 2</option>
							<option value="3">CEO de Empresa 3</option>
						</select>
					</div>

					<br><br>
					<div class="container-login100-form-btn">
					<!-- <a href="tablausuarios-dir.php"><input class="login100-form-btn" type="submit" value="Registrar"></a> -->
					<input class="login100-form-btn" type="submit" value="Registrar">
					</div>
					<br>
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1511895426328-dc8714191300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
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