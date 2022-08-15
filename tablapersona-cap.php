<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/icons/tabla.png"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Contacto</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn-center" href="menu-cap.php">Volver al menú</a></left>
      </div>
      <br>
      <h2 class="mb-5">Contacto</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Empresa</th>
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
            // 172.16.22.106 escuela
            // 192.168.100.52 casa Pam
            $serverName = "172.16.22.106, 1433";
            $connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
            $conn = sqlsrv_connect( $serverName, $connectionInfo );

            if( $conn === false ) {
              die( print_r( sqlsrv_errors(), true));
            }

            $query = "SELECT usuario, puesto FROM usuarios WHERE puesto=2";
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

            $sql = "SELECT ipersona, b.razonsocial AS empresa, nombre, apaterno, amaterno, CAST(fnacimiento as varchar) AS fecnac, puesto, a.telefono AS telefono, a.pais AS pais, a.estado AS estado, a.municipio AS alcaldia, 
            a.colonia AS colonia, a.calle AS calle, a.numeroint AS numeroint, a.numeroext AS numeroext, a.codpostal AS codpostal 
            FROM Persona a
            inner join Empresa b ON a.iempresa=b.iempresa";
            $stmt=sqlsrv_query( $conn, $sql );

            while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
            {
              echo("<tr><td>".$nreg["ipersona"]."</td>
                <td>".$nreg["empresa"]."</td>
                <td>".$nreg["nombre"]."</td>
                <td>".$nreg["apaterno"]."</td>
                <td>".$nreg["amaterno"]."</td>
                <td>".$nreg["fecnac"]."</td>
                <td>".$nreg["puesto"]."</td>
                <td>".$nreg["telefono"]."</td>
                <td>".$nreg["pais"]."</td>
                <td>".$nreg["estado"]."</td>
                <td>".$nreg["alcaldia"]."</td>
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
      <br><br>
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn" href="registropersona-cap.php">Añadir Contacto</a></left>
      </div>
    </div>
  </div>
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>