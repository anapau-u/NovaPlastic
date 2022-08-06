<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro de clientes</title>
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

	$varip=$_SERVER['REMOTE_ADDR'];

	echo $varusu;
	echo $varip;

?>
<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-left">
				<form class="login100-form validate-form" action="registrocliente-form.php" method="POST">
					<div class="container-login100-form-btn-right">
						<left><a class="login100-form-btn-center" href="menu-cap.php">Volver al menú</a></left>
					</div>
					<br>
					<span class="login100-form-title p-b-43">Registro de clientes</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingresa la Razón Social">
						<input class="input100" type="text" name="razonsocial">
						<span class="focus-input100"></span>
						<span class="label-input100">Razón Social</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el teléfono">
						<input class="input100" type="text" name="telefono">
						<span class="focus-input100"></span>
						<span class="label-input100">Teléfono</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el país">
						<input class="input100" type="text" name="pais">
						<span class="focus-input100"></span>
						<span class="label-input100">País</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el estado">
						<input class="input100" type="text" name="estado">
						<span class="focus-input100"></span>
						<span class="label-input100">Estado</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el municipio">
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

					<div class="wrap-input100 validate-input" data-validate="Ingresa la colonia">
						<input class="input100" type="text" name="colonia">
						<span class="focus-input100"></span>
						<span class="label-input100">Colonia</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingresa la calle">
						<input class="input100" type="text" name="calle">
						<span class="focus-input100"></span>
						<span class="label-input100">Calle</span>
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
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
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