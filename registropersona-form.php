<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro Contacto</title>
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
				<form class="login100-form validate-form" action="tablapersona-cap.php" method="POST">
					<span class="login100-form-title p-b-43">Registro de Contacto</span>
					<?php
						// 172.16.22.106 escuela
						// 192.168.100.52 casa Pam
						$serverName = "172.16.22.106, 1433";
						$connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
						$conn = sqlsrv_connect( $serverName, $connectionInfo );

						if( $conn === false ) {
							die( print_r( sqlsrv_errors(), true));
						}

						$query = "SELECT usuario, puesto FROM usuarios WHERE puesto=2";
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
						
						$variemp = $_POST['iempresa'];
						$varnom = $_POST['nombre'];
						$varap = $_POST['apaterno'];
						$varam = $_POST['amaterno'];
						$varfecnac = $_POST['fnacimiento'];
						$varpu = $_POST['puesto'];
						$varcorr = $_POST['correo'];
						$vartel = $_POST['telefono'];
						$varpa = $_POST['pais'];
						$varest = $_POST['estado'];
						$varmun = $_POST['municipio'];
						$varcol = $_POST['colonia'];
						$varcall = $_POST['calle'];
						$varint = $_POST['numeroint'];
						$varext = $_POST['numeroext'];
						$varpost = $_POST['codpostal'];


						$conn = sqlsrv_connect( $serverName, $connectionInfo );
						if( $conn === false ) {
							die( print_r( sqlsrv_errors(), true));
						}

						$sql = "exec sp_insertpersona '".$varusu."', 
													'".$varip."', 
													'".$variemp."', 
													'".$varnom."', 
													'".$varap."', 
													'".$varam."', 
													'".$varfecnac."', 
													'".$varpu."', 
													'".$vartel."', 
													'".$varpa."',
													'".$varest."',
													'".$varmun."',
													'".$varcol."',
													'".$varcall."',
													'".$varint."',
													'".$varext."',
													'".$varpost."'";

						$stmt = sqlsrv_query( $conn, $sql );
						if( $stmt === false) {
							die( print_r( sqlsrv_errors(), true) );
						}

						while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
							echo $row['mensaje']."<br />";
						}

						sqlsrv_free_stmt( $stmt);
					?>
					<br>
                    <div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" value="Ver Contactos">
					</div>
					<br>
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1522199899308-2eef382e2158?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80');">
				</div>
			</div>
		</div>
	</div>
</html>