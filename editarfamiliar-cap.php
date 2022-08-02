<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editar Familiar</title>
	<!--     Fonts and icons     -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/editar.png"/>
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
				<form class="login100-form validate-form" action="editarfamiliar.php" method="POST">
					<span class="login100-form-title p-b-43">Editar Familiar</span>

                    <div class="wrap-input100 validate-input" data-validate="Ingresa el nombre">
						<input class="input100" type="text" name="nombre">
						<span class="focus-input100"></span>
						<span class="label-input100">Nombre</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Ingresa el Apellido paterno">
						<input class="input100" type="text" name="apellidop">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Paterno</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Ingresa el Apellido Materno">
						<input class="input100" type="text" name="apellidom">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Materno</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Ingresa la Fecha de nacimiento">
						<input class="input100" type="date" name="fecnac">
						<span class="focus-input100"></span>
						<span class="label-input100">Fecha de nacimiento</span>
					</div>
					<br><br>
					<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" value="Modificar">
					</div>
					<br>
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1605812830455-2fadc55bc4ba?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
				</div>
			</div>
		</div>
	</div>
</html>