<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editar Familiar</title>
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
				<form class="login100-form validate-form" action="editarfamiliar-cap.html" method="POST">
					<span class="login100-form-title p-b-43">Editar Persona</span>
<?php
    $serverName = "172.16.22.106, 1433";
    $connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
    
    $variper = $_POST['ipersona'];
    $varnom = $_POST['nombre'];
    $varap = $_POST['apaterno'];
    $varam = $_POST['amaterno'];
    $varnac = $_POST['fnacimiento'];
    $varpu = $_POST['puesto'];
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

    $sql = "exec sp_insertpersona '".$varnom."', 
                                  '".$varap."', 
                                  '".$varam."', 
                                  '".$varnac."', 
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
                    <div class="container-login100-form-btn">
					<input class="login100-form-btn" type="submit" value="Menú principal">
					</div>
					<br>
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1605812830455-2fadc55bc4ba?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
				</div>
			</div>
		</div>
	</div>
</html>