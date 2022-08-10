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

    $idempresa = $_POST['iempresa'];

    //$query1 = "SELECT razonsocial FROM Empresa WHERE iempresa=$idempresa";
    $query1 = "SELECT * FROM Empresa WHERE iempresa=$idempresa";
    $consulta1 = sqlsrv_query( $conn, $query1 );

    while( $row = sqlsrv_fetch_array( $consulta1, SQLSRV_FETCH_ASSOC) )
	{
	  $razonsocial=$row['razonsocial'];
      $telefono=$row['telefono'];
	}

    //echo $idempresa;
    //echo $razonsocial;

    ?>
    <form action="editarcliente-form.php" method="post">
    <input type="text" name="razonsocial" value="<?php echo $razonsocial; ?>">
    <br>
    <input type="text" name="telefono" value="<?php echo $telefono; ?>">