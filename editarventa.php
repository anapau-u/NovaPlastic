<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editar Venta</title>
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
<?php
	// 172.16.22.106 escuela
	// 192.168.100.52 casa Pam
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

    $idventa = $_POST['iventa'];

    //$query1 = "SELECT razonsocial FROM Empresa WHERE iempresa=$idempresa";
    $query1 = "SELECT * FROM Ventas WHERE iventa=$idventa";
    $consulta1 = sqlsrv_query( $conn, $query1 );

    while( $row = sqlsrv_fetch_array( $consulta1, SQLSRV_FETCH_ASSOC) )
	{
	  $variven=$row['iventa'];
	  $varimp=$row['importe'];
	  $varmon=$row['moneda'];
	}

    ?>

	<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-center">
					<form class="login100-form validate-form" action="editarventa-form.php" method="post">
					<div class="container-login100-form-btn-right">
						<left><a class="login100-form-btn-center" href="menu-sup.php">Volver al menú</a></left>
					</div>	
					<br>
                    <span class="login100-form-title p-b-43">Editar información de la Venta</span>
					<center>Modifica los campos que necesitan actualizarse <br> y envia los cambios.</center>
					<br>
					Num. de Venta:
					<div class="wrap-input100">
						<input class="input100" type="text" readonly="iventa" name="iventa" value="<?php echo $variven; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Importe:
					<div class="wrap-input100 validate-input" data-validate = "Ingresa el Importe">
						<input class="input100" type="text" name="importe" value="<?php echo $varimp; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Moneda:
					<div class="wrap-input100 validate-input" data-validate="Ingresa la moneda">
						<input class="input100" type="text" name="moneda" value="<?php echo $varmon; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>

					<div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" value="Actualizar">
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