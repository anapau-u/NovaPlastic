<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/icons/analista.png"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Clientes - Supervisor</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <h2 class="mb-5">Clientes</h2>
      <div class="container-login100-form-btn-right">
        <right><a class="login100-form-btn" href="menu-cap.html">Regresar al Menú</a></right>
      </div>
      <br><br>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr> 
              <th scope="col">Id</th>
              <th scope="col">Razón Social</th>
              <th scope="col">Telefono</th>
              <th scope="col">País</th>
              <th scope="col">Estado</th>
              <th scope="col">Municipio</th>
              <th scope="col">Colonia</th>
              <th scope="col">Calle</th>
              <th scope="col">Número Interior</th>
              <th scope="col">Número Exterior</th>
              <th scope="col">Código Postal</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>

          <?php
            $serverName = "172.16.22.106, 1433";
            $connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");

            $conn = sqlsrv_connect( $serverName, $connectionInfo );
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }

            $sql = "SELECT * FROM Empresa";
            $stmt=sqlsrv_query( $conn, $sql );

            while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
            {
                printf("<tr><td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td>&nbsp;%s&nbsp;</td>
                            <td><a href=\"bajacliente.php?iempresa=%d\">BORRAR</a></td>
                        </tr>",
                        $nreg["iempresa"], 
                        $nreg["razonsocial"], 
                        $nreg["telefono"], 
                        $nreg["pais"], 
                        $nreg["estado"], 
                        $nreg["municipio"], 
                        $nreg["colonia"], 
                        $nreg["calle"], 
                        $nreg["numeroint"], 
                        $nreg["numeroext"], 
                        $nreg["codpostal"], 
                        $nreg["iempresa"]);
            }
          ?>
          </tbody>
        </table>
        <br><br>
      </div>
      <br><br>
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn" href="registrocliente-cap.html">Añadir Cliente</a></left>
      </div>
    </div>
  </div>
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>