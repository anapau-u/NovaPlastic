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

    <title>Ventas - Director</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn-center" href="menu-dir.php">Volver al menú</a></left>
      </div>
      <br>
      <h2 class="mb-5">Ventas</h2>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar...">
      <br>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr> 
              <th scope="col">Id</th>
              <th scope="col">Empresa</th>
              <th scope="col">Importe</th>
              <th scope="col">Moneda</th>
              <th scope="col">Fecha</th>
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

            $query = "SELECT usuario, puesto FROM usuarios WHERE puesto=4";
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

            $sql = "SELECT a.iempresa AS iempresa, b.razonsocial AS empresa, importe, moneda, CAST(fecha as varchar) as fecha 
            FROM Ventas a
            INNER JOIN Empresa b ON a.iempresa=b.iempresa
            WHERE a.estatus=1
            ORDER BY b.razonsocial";
            
            $stmt=sqlsrv_query( $conn, $sql );

            while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo("<tr><td>".$nreg["iempresa"]."</td>
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
        <script>
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
  </script>
      </div>
      <br><br>
    </div>
  </div>

  
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>