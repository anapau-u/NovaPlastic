<!DOCTYPE html>
<html lang="en">
<head>
<?php
	$serverName = "192.168.100.52, 1433";
	$connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$sql = "SELECT usuario, puesto FROM usuarios";
	$stmt = sqlsrv_query( $conn, $sql );
	
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}

	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
	{
	  $varusu=$row['usuario'];
	  $varpuesto=$row['puesto'];
	}
    session_start();
	$_SESSION['usuario']=$varusu;
	$_SESSION['puesto']=$varpuesto;

?>
	<title>Editar Cliente</title>
	<!--     Fonts and icons     -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/supervisor.png"/>
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
			<div class="wrap-login100-center">
				<form class="login100-form validate-form" action="valida.php" method="post">
					<span class="login100-form-title p-b-43">Editar información del cliente</span>
					<center>Selecciona el registro que deseas editar<br> y llena únicamente los campos a modificar.</center>
					<br>
					<div class="wrap-input100 validate-input" data-validate = "Persona requerida">
						<span class="label-input100">Elige un contacto</span>
						<select class="input100-select" id="ipersonaempresa" name="ipersoaempresa">
							<option value="vacio" selected> </option>
							<option value="c1">McDonald's - Jose Carillo Juarez</option>
							<option value="c2">McDonald's - Andrea Islas Quiroz</option>
							<option value="c3">Starbucks Coffee - Paulina Suarez Lopez</option>
							<option value="c4">Starbucks Coffee - Eduardo Salazar Camacho</option>
						</select>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Usuario requerido: ex@abc.xyz">
						<input class="input100" type="text" name="razonsocial">
						<span class="focus-input100"></span>
						<span class="label-input100">Razón Social</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Usuario requerido: ex@abc.xyz">
						<input class="input100" type="text" name="calle">
						<span class="focus-input100"></span>
						<span class="label-input100">Calle</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Usuario requerido: ex@abc.xyz">
						<input class="input100" type="text" name="telefono">
						<span class="focus-input100"></span>
						<span class="label-input100">Teléfono</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="uwu">
						<input class="input100" type="text" name="colonia">
						<span class="focus-input100"></span>
						<span class="label-input100">Colonia</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Usuario requerido: ex@abc.xyz">
						<input class="input100" type="text" name="numeroext">
						<span class="focus-input100"></span>
						<span class="label-input100">Número exterior</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Usuario requerido: ex@abc.xyz">
						<input class="input100" type="text" name="numeroint">
						<span class="focus-input100"></span>
						<span class="label-input100">Número interior</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Usuario requerido: ex@abc.xyz">
						<input class="input100" type="text" name="codpostal">
						<span class="focus-input100"></span>
						<span class="label-input100">Código Postal</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Usuario requerido: ex@abc.xyz">
						<input class="input100" type="text" name="pais">
						<span class="focus-input100"></span>
						<span class="label-input100">País</span>
					</div>

					<div class="container-login100-form-btn">
						<a class="login100-form-btn" href="tablaclientes-sup.html">Actualizar</a>
					</div>
					<br>
				</form>
				<!-- <img src="https://images.unsplash.com/photo-1525498128493-380d1990a112?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80"> -->

				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1521459382675-a3f2f35a6b9a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80');">
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