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

    <title>Ventas - Capturista</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <h2 class="mb-5">Ventas</h2>
      <div class="container-login100-form-btn-right">
        <right><a class="login100-form-btn" href="menu-cap.php">Regresar al Menú</a></right>
      </div>
      <br><br>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr> 
              <th scope="col">Id</th>
              <th scope="col">Empresa</th>
              <th scope="col">Importe</th>
              <th scope="col">Moneda Paterno</th>
              <th scope="col">Fecha</th>
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

            $sql = "SELECT iventa, b.razonsocial AS empresa, importe, moneda, CAST(fecha as varchar) as fecha 
            FROM Ventas a
            INNER JOIN Empresa b ON a.iempresa=b.iempresa";
            // 18
            $stmt=sqlsrv_query( $conn, $sql );

            while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo("<tr><td>".$nreg["iventa"]."</td>
                    <td>".$nreg["empresa"]."</td>
                    <td>".$nreg["importe"]."</td>
                    <td>".$nreg["moneda"]."</td>
                    <td>".$nreg["fecha"]."</td> 
                </tr>");
            }
          ?>
          </tbody>
        </table>
        <br><br>
      </div>
      <br><br>
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn" href="registroventa-cap.php">Añadir Venta</a></left>
      </div>
    </div>
  </div>
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>