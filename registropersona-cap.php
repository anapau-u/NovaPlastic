<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro de Contacto</title>
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
    
    $serverName = "172.16.22.106, 1433";
    $connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );

    if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }

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
				<form class="login100-form validate-form" action="registrousuario-form.php" method="post">
					<span class="login100-form-title p-b-43">Registro de usuarios</span>

                    <div class="wrap-input100 validate-input" data-validate="Selecciona una Empresa">
                    <span class="focus-input100"></span>
                    <span class="label-input100"></span>
                    <select class="input100-select"  name="iempresa" id="iempresa"><br>
                        <option value="0">Selecciona la Empresa</option>
                        <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                            <option value="<?php echo $row['iempresa']; ?>"><?php echo $row['razonsocial']; ?></option>
                        <?php } sqlsrv_free_stmt( $stmt);?>
                    </select>
                    </div>

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

					<div class="wrap-input100 validate-input" data-validate="Ingresa el Teléfono">
						<input class="input100" type="tel" name="telefono">
						<span class="focus-input100"></span>
						<span class="label-input100">Teléfono</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el País">
						<input class="input100" type="text" name="pais">
						<span class="focus-input100"></span>
						<span class="label-input100">País</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Inserta el Estado">
						<input class="input100" type="text" name="estado">
						<span class="focus-input100"></span>
						<span class="label-input100">Estado</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Selecciona un Municipio">
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

					<div class="wrap-input100 validate-input" data-validate="Ingresa la Colonia">
						<input class="input100" type="text" name="colonia">
						<span class="focus-input100"></span>
						<span class="label-input100">Colonia</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingresa la Calle">
						<input class="input100" type="text" name="calle">
						<span class="focus-input100"></span>
						<span class="label-input100">Calle</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el Número Interior">
						<input class="input100" type="number" name="numeroint">
						<span class="focus-input100"></span>
						<span class="label-input100">Número interior</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa el Número Exterior">
						<input class="input100" type="number" name="numeroext">
						<span class="focus-input100"></span>
						<span class="label-input100">Número exterior</span>
					</div>
          
					<div class="wrap-input100 validate-input" data-validate="Ingresa el Código Postal">
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
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1565682443434-3e175adc793f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80');">
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