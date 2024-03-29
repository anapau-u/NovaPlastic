<!DOCTYPE html>
<html lang="en">
<head>
	<title>Master Menu</title>
	<!--     Fonts and icons     -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/master.png"/>
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
	$serverName = "172.16.22.106, 1433";
	$connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$query = "SELECT usuario, puesto FROM usuarios WHERE puesto =1";
	$sesionqry = sqlsrv_query( $conn, $query );
	
	if( $sesionqry === false) {
		die( print_r( sqlsrv_errors(), true) );
	}

	while( $row = sqlsrv_fetch_array( $sesionqry, SQLSRV_FETCH_ASSOC) )
	{
	  $varusu=$row['usuario'];
	  $varpuesto=$row['puesto'];
	}
    session_start();
	$_SESSION['usuario']=$varusu;
	$_SESSION['puesto']=$varpuesto;

	$varip=$_SERVER['REMOTE_ADDR'];

?>
<body style="background-color: #ebf7f3;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="valida-form.php" method="post">
					<span class="login100-form-title p-b-43">Menú Maestro</span>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><a class="login100-form-btn" href="tablaclientes-cap.php">Clientes</a></button>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><a class="login100-form-btn" href="tablaventas-cap.php">Ventas</a></button>
					</div>
                    <br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><a class="login100-form-btn" href="tablapersona-cap.php">Contactos</a></button>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><a class="login100-form-btn" href="tablafamiliar-cap.php">Familiares</a></button>
					</div>
                    <br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><a class="login100-form-btn" href="tablareporte-dir.php">Reportes</a></button>
					</div>
                    <br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><a class="login100-form-btn" href="tablausuarios-dir.php">Usuarios</a></button>
					</div>
                    <br>
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1587502536575-6dfba0a6e017?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80');">
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