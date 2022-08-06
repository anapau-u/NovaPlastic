<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/icons/director.png"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Tabla Familiares - Director</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <h2 class="mb-5">Familiares</h2>
      <div class="container-login100-form-btn-right">
        <right><a class="login100-form-btn" href="menu-dir.php">Regresar al Menú</a></right>
      </div>
      <br><br>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr> 
              <th scope="col">Id</th>
              <th scope="col">Nombre Contacto</th>
              <th scope="col">Parentesco</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido Paterno</th>
              <th scope="col">Apellido Materno</th>
              <th scope="col">Fecha de nacimiento</th>
            </tr>
          </thead>
          <tbody>
          <?php
	$serverName = "192.168.100.52, 1433";
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

?>
          <?php
            $serverName = "192.168.100.52, 1433";
            $connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");

            $conn = sqlsrv_connect( $serverName, $connectionInfo );
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }

            $sql = "SELECT ifamiliar, c.nombre AS nombrepers, tipoparenteso, a.nombre AS nombrefam, apellidop, apellidom, CAST(a.fnacimiento AS varchar) AS fnacfam 
            FROM familiar a
            INNER JOIN parentesco b ON a.iparentesco=b.iparentesco
            INNER JOIN Persona c ON a.ipersona=c.ipersona";
            $stmt=sqlsrv_query( $conn, $sql );

            while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo("<tr><td>".$nreg["ifamiliar"]."</td>
                    <td>".$nreg["nombrepers"]."</td>
                    <td>".$nreg["tipoparenteso"]."</td>
                    <td>".$nreg["nombrefam"]."</td>
                    <td>".$nreg["apellidop"]."</td>
                    <td>".$nreg["apellidom"]."</td>
                    <td>".$nreg["fnacfam"]."</td>
                </tr>");
            }
          ?>
          </tbody>
        </table>
        <br><br>
      </div>
    </div>
  </div>
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>