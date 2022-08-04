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

    <title>Reporte - director</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <h2 class="mb-5">Reportes de empresas</h2>
      <div class="container-login100-form-btn-right">
        <right><a class="login100-form-btn" href="menu-cap.php">Regresar al Menú</a></right>
      </div>
      <br>
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown1" data-toggle="dropdown">Filtro</button>
      <div class="dropdown-menu">
      <a class="dropdown-item">Ejemplo</a>
      <a class="dropdown-item">Ejemplo 2</a>
  </div>
  <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr> 
              <th scope="col">ID</th>
              <th scope="col">Empresa</th>
              <th scope="col">Importe</th>
              <th scope="col">Moneda</th>
              <th scope="col">Fecha</th>
            </tr>
          </thead>
          <tbody>
          <!-- CEO -->
          <?php
            $ip="172.16.22.106";
            $serverName = "$ip, 1433";
            //$serverName = "192.168.100.5, 1433";
            $connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");

            $conn = sqlsrv_connect( $serverName, $connectionInfo );
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }

            $sql = "SELECT iventa, iempresa, importe, moneda, CAST(fecha as varchar) as fecha FROM Ventas";
            $stmt=sqlsrv_query( $conn, $sql );

            while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
            {
                printf("<tr><td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                        </tr>",
                        $nreg["iventa"], 
                        $nreg["iempresa"], 
                        $nreg["importe"], 
                        $nreg["moneda"], 
                        $nreg["fecha"]);
            }
          ?>
          </tbody>
        </table>
    </div>
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>