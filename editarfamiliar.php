<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editar Familiar</title>
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
	$serverName = "172.16.22.106, 1433";
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

    $idfamiliar = $_POST['ifamiliar'];

    $query1 = "SELECT * FROM familiar WHERE estatus=1 and ifamiliar=$idfamiliar";
    $consulta1 = sqlsrv_query( $conn, $query1 );

    if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
        echo "No se encontró un familiar con esas especificaciones. Por favor regrese al menú.";
	}

    while( $row = sqlsrv_fetch_array( $consulta1, SQLSRV_FETCH_ASSOC) )
	{
	  $varifam=$row['ifamiliar'];
	  $varnom=$row['nombre'];
	  $varap=$row['apellidop'];
	  $varam=$row['apellidom'];
	  $varfecnac=$row['fnacimiento'];

    }

    ?>

	<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-center">
					<form class="login100-form validate-form" action="editarfamiliar-form.php" method="post">
					<span class="login100-form-title p-b-43">Editando información del familiar: <?php echo $varnom; ?></span>
					<center>Modifica los campos que necesitan actualizarse <br> y envia los cambios.</center>
					<br>
                    <div class="wrap-input100 validate-input" data-validate="Inserta un Nombre">
						<input class="input100" type="text" readonly="ifamiliar" name="ifamiliar" value="<?php echo $varifam; ?>"> 
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Inserta un Nombre" value="<?php echo $varnom; ?>">
						<input class="input100" type="text" name="nombre">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Inserta un Apellido Paterno" value="<?php echo $varap; ?>">
						<input class="input100" type="text" name="apaterno">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Inserta un Apellido Materno" value="<?php echo $varam; ?>">
						<input class="input100" type="text" name="amaterno">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Inserta una Fecha" value="<?php echo $varfecnac; ?>">
						<input class="input100" type="date" name="fnacimiento">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>

					<br>
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