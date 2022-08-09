<!DOCTYPE html>
<html lang="en">
<head>
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

	$variemp=$_POST['iempresa'];


    $sql = "SELECT iempresa, razonsocial FROM Empresa";
    $stmt = sqlsrv_query( $conn, $sql );

	$sql2 = "SELECT razonsocial, telefono, pais, estado, municipio, colonia, calle, 
	numeroint, numeroext, codpostal FROM Empresa WHERE iempresa=$variemp ";



    $stmt2 = sqlsrv_query( $conn, $sql2 );

?>
<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-center">
				<form class="login100-form validate-form" action="editarcliente-form.php" method="post">
					<span class="login100-form-title p-b-43">Editar información del cliente</span>
					<center>Selecciona el registro que deseas editar<br> y llena únicamente los campos a modificar.</center>
					<br>
					
					<?php
						while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

						}
						$sql2 = "SELECT razonsocial, telefono, pais, estado, municipio, colonia, calle, 
						numeroint, numeroext, codpostal FROM Empresa WHERE iempresa="$row['iempresa']"";
					
						$stmt2 = sqlsrv_query( $conn, $sql2 );
						while ( $reg = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC)) {
							$regrz=$reg['razonsocial'];
							$regtel=$reg['telefono'];
							$regpais=$reg['pais'];
							$regedo=$reg['estado'];
							$regmun=$reg['municipio'];
							$regcol=$reg['colonia'];
							$regcalle=$reg['calle'];
							$regnint=$reg['numeroint'];
							$regnext=$reg['numeroext'];
							$regrcp=$reg['codpostal'];
						}
					
					?>

					
					<div class="wrap-input100" >
						<input class="input100" type="text" name="razonsocial" value="<?php echo $regrz;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Razón Social</span>
					</div>

					<div class="wrap-input100" >
						<input class="input100" type="text" name="telefono" value="<?php echo $regtel;?>"> 
						<span class="focus-input100"></span>
						<span class="label-input100">Teléfono</span>
					</div>

					<div class="wrap-input100" >
						<input class="input100" type="text" name="pais" value="<?php echo $regpais;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">País</span>
					</div>

					<div class="wrap-input100" >
						<input class="input100" type="text" name="estado" value="<?php echo $regedo;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Estado</span>
					</div>

					<div class="wrap-input100" >
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
						<select class="input100-select" id="municipio" name="municipio" value="<?php echo $regmun;?>">
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

					<div class="wrap-input100" >
						<input class="input100" type="text" name="colonia" value="<?php echo $regcol;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Colonia</span>
					</div>

					<div class="wrap-input100" >
						<input class="input100" type="text" name="calle" value="<?php echo $regcalle;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Calle</span>
					</div>
          
					<div class="wrap-input100" >
						<input class="input100" type="number" name="numeroint" value="<?php echo $regnint;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Número interior</span>
					</div>

					<div class="wrap-input100" >
						<input class="input100" type="number" name="numeroext" value="<?php echo $regnext;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Número exterior</span>
					</div>
          
					<div class="wrap-input100" >
						<input class="input100" type="number" name="codpostal" value="<?php echo $regcp;?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Código Postal</span>
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