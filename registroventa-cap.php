<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro Ventas</title>
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

    $sql = "SELECT iempresa, razonsocial FROM Empresa";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
?>
<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-left">
				<form class="login100-form validate-form" action="registroventa-form.php" method="post">
					<div class="container-login100-form-btn-right">
						<left><a class="login100-form-btn-center" href="menu-cap.php">Volver al menú</a></left>
					</div>
					<br>
					<span class="login100-form-title p-b-43">Registro de Ventas</span>
					
					<div class="wrap-input100 validate-input" data-validate="Selecciona la Empresa">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select"  name="iempresa" id="iempresa"><br>
							<option value="0">Selecciona la Empresa</option>
							<?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
								<option value="<?php echo $row['iempresa']; ?>"><?php echo $row['razonsocial']; ?></option>
							<?php } sqlsrv_free_stmt( $stmt);?>
						</select>
                    </div>

					<div class="wrap-input100 validate-input" data-validate = "Escribe el importe de la venta">
						<input class="input100" type="number" name="importe">
						<span class="focus-input100"></span>
						<span class="label-input100">Importe</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Selecciona el tipo de cambio">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="moneda" name="moneda">
							<option value="vacio" selected>Selecciona el tipo de cambio</option>
							<option value="Pesos">Pesos</option>
							<option value="Dolares">Dólares</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Selecciona una fecha">
						<input class="input100" type="date" name="fecha">
						<!-- <span class="focus-input100">Fecha</span>
						<span class="label-input100">Fecha</span> -->
					</div>

					<br><br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">Registrar</button>
					</div>
					<br>
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1599027619483-9a92c1542d6e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80');">
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