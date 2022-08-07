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
<?php
	$serverName = "192.168.100.52, 1433";
	$connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$query = "SELECT usuario, puesto FROM usuarios";
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

    $sql = "SELECT iparentesco, nombre FROM familiar";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
?>
<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-left">
				<form class="login100-form validate-form" action="registrofamiliar-form.php" method="post">
					<div class="container-login100-form-btn-right">
						<left><a class="login100-form-btn-center" href="menu-cap.php">Volver al menú</a></left>
					</div>
					<br>
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
                    <select class="input100-select"  name="iparentesco" id="iparentesco"><br>
                        <option value="0">Selecciona el Parentesco</option>
                        <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                            <option value="<?php echo $row['iparentesco']; ?>"><?php echo $row['tipoparenteso']; ?></option>
                        <?php } sqlsrv_free_stmt( $stmt);?>
                    </select>
                    </div>

					<div class="wrap-input100 validate-input" data-validate="Selecciona la Empresa">
                    <span class="focus-input100"></span>
                    <span class="label-input100"></span>
                    <select class="input100-select"  name="iempresa" id="iempresa"><br>
                        <option value="0">Selecciona la Empresa</option>
                        <?php while( $row = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_ASSOC) ) {?>
                            <option value="<?php echo $row['iempresa']; ?>"><?php echo $row['razonsocial']; ?></option>
                        <?php } sqlsrv_free_stmt( $stmt3);?>
                    </select>
                    </div>
					
					<div class="wrap-input100 validate-input" data-validate="Selecciona al Familiar Titular">
                    <span class="focus-input100"></span>
                    <span class="label-input100"></span>
                    <select class="input100-select"  name="ipersona" id="ipersona"><br>
                        <option value="0">Selecciona al Familiar Titular</option>
                        <?php while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {?>
                            <option value="<?php echo $row['ipersona']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } sqlsrv_free_stmt( $stmt2);?>
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