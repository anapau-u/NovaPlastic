<!DOCTYPE html>
<html lang="en">
<head>
<?php
	// 172.16.22.106 escuela
	// 192.168.100.52 casa Pam
	$serverName = "172.16.22.106, 1433";
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

	$sql = "SELECT iusuario, username FROM usuarios"; //checa primero en sql si los campos estan bien
    $stmt = sqlsrv_query( $conn, $sql );

?>
	<title>Editar Usuario</title>
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
<body style="background-color: #e9fff9;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-center">
				<form class="login100-form" action="editarusuario-form.php" method="post">
					<span class="login100-form-title p-b-43">Editar información del usuario</span>
					<center>Selecciona el registro que deseas editar<br> y llena únicamente los campos a modificar.</center>
					<br>
                    <div class="wrap-input100" >
                    <span class="focus-input100"></span>
                    <span class="label-input100"></span>
                    <select class="input100-select"  name="iusuario" id="iusuario"><br>
                        <option value="0">Selecciona el Usuario</option>
                        <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                            <option value="<?php echo $row['iusuario']; ?>"><?php echo $row['username']; ?></option>
                        <?php } sqlsrv_free_stmt( $stmt);?>
                    </select>
                    </div>
                    <div class="wrap-input100 ">
						<input class="input100" type="text" name="usuario">
						<span class="focus-input100"></span>
						<span class="label-input100">Nuevo Usuario</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="clave">
						<span class="focus-input100"></span>
						<span class="label-input100">Nueva Contraseña</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="nombre">
						<span class="focus-input100"></span>
						<span class="label-input100">Nombre</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="apaterno">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Paterno</span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="text" name="apaterno">
						<span class="focus-input100"></span>
						<span class="label-input100">Apellido Materno</span>
					</div>

                    <div class="wrap-input100">
						<input class="input100" type="date" name="fecnac">
						<span class="focus-input100"></span>
						<span class="label-input100">Fecha de nacimiento</span>
					</div>

                    <div class="wrap-input100">
						<span class="focus-input100"></span>
						<span class="label-input100">Puesto</span>
						<select class="input100-select" id="puesto" name="puesto">
							<option value="vacio" selected> </option>
							<option value="c1">Capturista</option>
							<option value="c2">Supervisor</option>
							<option value="c3">Director</option>
						</select>
					</div>

                    <div class="wrap-input100">
						<input class="input100" type="text" name="calle">
						<span class="focus-input100"></span>
						<span class="label-input100">Calle</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="telefono">
						<span class="focus-input100"></span>
						<span class="label-input100">Teléfono</span>
					</div>
					
					<div class="wrap-input100">
						<input class="input100" type="text" name="estado">
						<span class="focus-input100"></span>
						<span class="label-input100">Estado</span>
					</div>

					<div class="wrap-input100">
						<span class="focus-input100"></span>
						<span class="label-input100">Municipio</span>
						<select class="input100-select" id="municipio" name="municipio">
							<option value="vacio" selected> </option>
							<option value="c1">Álvaro Obregón</option>
							<option value="c2">Azcapotzalco</option>
							<option value="c3">Benito Juárez</option>
							<option value="c4">Coyoacán</option>
							<option value="c5">Cuauhtémoc</option>
							<option value="c6">Cuajimalpa de Morelos</option>
							<option value="c7">Gustavo A. Madero</option>
							<option value="c8">Iztacalco</option>
							<option value="c9">Iztapalapa</option>
							<option value="c10">Magdalena Contreras</option>
							<option value="c11">Miguel Hidalgo</option>
							<option value="c12">Milpa Alta</option>
							<option value="c13">Tláhuac</option>
							<option value="c14">Tlalpan</option>
							<option value="c15">Venustiano Carranza</option>
							<option value="c16">Xochimilco</option>
						</select>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="colonia">
						<span class="focus-input100"></span>
						<span class="label-input100">Colonia</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="number" name="numeroext">
						<span class="focus-input100"></span>
						<span class="label-input100">Número exterior</span>
					</div>
          
					<div class="wrap-input100">
						<input class="input100" type="number" name="numeroint">
						<span class="focus-input100"></span>
						<span class="label-input100">Número interior</span>
					</div>
          
					<div class="wrap-input100">
						<input class="input100" type="number" name="codpostal">
						<span class="focus-input100"></span>
						<span class="label-input100">Código Postal</span>
					</div>
          
					<div class="wrap-input100">
						<input class="input100" type="text" name="pais">
						<span class="focus-input100"></span>
						<span class="label-input100">País</span>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Actualizar">
					</div>
					<br>
                </form>

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