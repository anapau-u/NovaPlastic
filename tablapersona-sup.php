<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/icons/supervisor.png"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Persona</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <h2 class="mb-5">Personas</h2>
      <div class="container-login100-form-btn-right">
        <right><a class="login100-form-btn" href="menu-sup.php">Regresar al Menú</a></right>
      </div>
      <br><br>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido Paterno</th>
              <th scope="col">Apellido Materno</th>
              <th scope="col">Fecha de nacimiento</th>
              <th scope="col">Puesto</th>
              <th scope="col">Telefono</th>
              <th scope="col">Pais</th>
              <th scope="col">Estado</th>
              <th scope="col">Municipio</th>
              <th scope="col">Colonia</th>
              <th scope="col">Calle</th>
              <th scope="col">Número interior</th>
              <th scope="col">Número exterior</th>
              <th scope="col">Código Postal</th>
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

            $sql = "SELECT ipersona, nombre, apaterno, amaterno, CAST(fnacimiento as varchar) as fnacimiento, puesto, telefono, pais, estado, municipio, colonia, calle, numeroint, numeroext, codpostal FROM Persona";
            $stmt=sqlsrv_query( $conn, $sql );

            while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
            {
              echo("<tr><td>".$nreg["ipersona"]."</td>
                        <td>".$nreg["nombre"]."</td>
                        <td>".$nreg["apaterno"]."</td>
                        <td>".$nreg["amaterno"]."</td>
                        <td>".$nreg["fnacimiento"]."</td>
                        <td>".$nreg["puesto"]."</td>
                        <td>".$nreg["telefono"]."</td>
                        <td>".$nreg["pais"]."</td>
                        <td>".$nreg["estado"]."</td>
                        <td>".$nreg["municipio"]."</td>
                        <td>".$nreg["colonia"]."</td>
                        <td>".$nreg["calle"]."</td>
                        <td>".$nreg["numeroint"]."</td>
                        <td>".$nreg["numeroext"]."</td>
                        <td>".$nreg["codpostal"]."</td>
                    </tr>");
            }
          ?>
          </tbody>
        </table>
        <br><br>
      </div>
      <br>
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn" href="registropersona-sup.html">Editar Contacto</a></left>
      </div>
      <br>
    </div>
  </div>
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>