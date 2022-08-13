<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editar Usuario</title>
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

    $idusuario = $_POST['iusuarios'];

    $query1 = "SELECT * FROM usuarios WHERE iusuarios=$idusuario";
    $consulta1 = sqlsrv_query( $conn, $query1 );

    while( $row = sqlsrv_fetch_array( $consulta1, SQLSRV_FETCH_ASSOC) )
	{
	  $variusu=$row['iusuarios'];
	  $varuser=$row['usuario'];
	  $varnom=$row['nombre'];
	  $varap=$row['apaterno'];
	  $varam=$row['amaterno'];
	  $varpue=$row['puesto'];
	  $vartel=$row['telefono'];
	  $varpais=$row['pais'];
	  $varedo=$row['estado'];
	  $varmun=$row['municipio'];
	  $varcol=$row['colonia'];
	  $varcalle=$row['calle'];
	  $varnint=$row['numeroint'];
	  $varnext=$row['numeroext'];
	  $varcp=$row['codpostal'];
	}
    ?>

	<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-center">
					<form class="login100-form validate-form" action="editarusuario-form.php" method="post">
					<div class="container-login100-form-btn-right">
						<left><a class="login100-form-btn-center" href="menu-dir.php">Volver al menú</a></left>
					</div>	
					<br>
					<span class="login100-form-title p-b-43">Editar información del Usuario: <?php echo $varuser; ?></span>
					<center>Modifica los campos que necesitan actualizarse <br> y envia los cambios.</center>
					<br>
					Núm. de Usuario:
					<div class="wrap-input100" >
						<input class="input100" type="text" name="iusuarios" value="<?php echo $variusu; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Usuario:
					<div class="wrap-input100 validate-input" data-validate = "Inserta un Usuario">
						<input class="input100" type="text" name="usuario" value="<?php echo $varuser; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Nombre:
					<div class="wrap-input100 validate-input" data-validate="Inserta un Nombre">
						<input class="input100" type="text" name="nombre" value="<?php echo $varnom; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Apellido Paterno
					<div class="wrap-input100 validate-input" data-validate="Inserta un Apellido Paterno">
						<input class="input100" type="text" name="apaterno" value="<?php echo $varap; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Apellido Materno:
					<div class="wrap-input100 validate-input" data-validate="Inserta un Apellido Materno">
						<input class="input100" type="text" name="amaterno" value="<?php echo $varam; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Puesto:
                    <div class="wrap-input100 validate-input" data-validate="Selecciona un Puesto">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="puesto" name="puesto" value="<?php echo $varpue; ?>">
							<option value="<?php echo $varpue; ?>" selected><?php echo $varpue; ?></option>
							<option value="2">Capturista</option>
							<option value="3">Supervisor</option>
							<option value="4">Director</option>
						</select>
					</div>
					Teléfono:
					<div class="wrap-input100 validate-input" data-validate="Ingresa el Teléfono">
						<input class="input100" type="tel" name="telefono" value="<?php echo $vartel; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					País:
					<div class="wrap-input100 validate-input" data-validate="Ingresa el País">
						<input class="input100" type="text" name="pais" value="<?php echo $varpais; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Estado:
					<div class="wrap-input100 validate-input" data-validate="Inserta el Estado">
						<input class="input100" type="text" name="estado" value="<?php echo $varedo; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Municipio:
					<div class="wrap-input100 validate-input" data-validate="Selecciona un Municipio">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="municipio" name="municipio" value="<?php echo $varmun; ?>">
							<option value="<?php echo $varmun; ?>" selected><?php echo $varmun; ?></option>
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
					Colonia:
					<div class="wrap-input100 validate-input" data-validate="Ingresa la Colonia">
						<input class="input100" type="text" name="colonia" value="<?php echo $varcol; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Calle:
					<div class="wrap-input100 validate-input" data-validate = "Ingresa la Calle">
						<input class="input100" type="text" name="calle" value="<?php echo $varcalle; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>	
					Número interior:
					<div class="wrap-input100 validate-input" data-validate="Ingresa el Número Interior">
						<input class="input100" type="number" name="numeroint" value="<?php echo $varnint; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Número exterior:
					<div class="wrap-input100 validate-input" data-validate="Ingresa el Número Exterior">
						<input class="input100" type="number" name="numeroext" value="<?php echo $varnext; ?>">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					Código Postal:
					<div class="wrap-input100 validate-input" data-validate="Ingresa el Código Postal">
						<input class="input100" type="number" name="codpostal" value="<?php echo $varcp; ?>">
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