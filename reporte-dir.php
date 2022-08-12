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
  <?php
    // 172.16.22.106 escuela
    // 192.168.100.52 casa Pam
    if (isset($_POST['mes']))
      $vperiodo=$_POST['mes'];
      if (isset($_POST['anio']))
      $vperiodo=$_POST['anio'];
      
    $serverName = "172.16.22.106, 1433";
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

    //$poranio=$_POST["anio"];
    //$pormes=$_POST["mes"];

    if ($vperiodo=="Ver por Mes")
    {
      $mesanio=$_POST['mesanio'];
      ?>
        <body>
          <div class="content">
            <div class="container">
                <div class="container-login100-form-btn-right">
                    <left><a class="login100-form-btn-center" href="menu-dir.php">Volver al menú</a></left>
                </div>
                <br>
              <h2 class="mb-5">Reportes de Ventas por Meses</h2>
              <h4><center>Año: <?php echo $mesanio ?></center></h4>
              <br>
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar...">
              <div class="table-responsive">
                <table class="table table-striped custom-table" id="myTable">
                  <thead>
                    <tr> 
                      <th scope="col">Id Empresa</th>
                      <th scope="col">Razon Social</th>
                      <th scope="col">Enero</th>
                      <th scope="col">Febrero</th>
                      <th scope="col">Marzo</th>
                      <th scope="col">Abril</th>
                      <th scope="col">Mayo</th>
                      <th scope="col">Junio</th>
                      <th scope="col">Julio</th>
                      <th scope="col">Agosto</th>
                      <th scope="col">Septiembre</th>
                      <th scope="col">Octubre</th>
                      <th scope="col">Noviembre</th>
                      <th scope="col">Diciembre</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql = "exec sp_pivotemes '".$mesanio."'";

                    $stmt=sqlsrv_query( $conn, $sql );

                    while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                    {
                        echo("<tr><td>".$nreg["iempresa"]."</td>
                                  <td>".$nreg["temprz"]."</td>
                                  <td>".$nreg["enero"]."</td>
                                  <td>".$nreg["febrero"]."</td>
                                  <td>".$nreg["marzo"]."</td>
                                  <td>".$nreg["abril"]."</td>
                                  <td>".$nreg["mayo"]."</td>
                                  <td>".$nreg["junio"]."</td>
                                  <td>".$nreg["julio"]."</td>
                                  <td>".$nreg["agosto"]."</td>
                                  <td>".$nreg["septiembre"]."</td>
                                  <td>".$nreg["octubre"]."</td>
                                  <td>".$nreg["noviembre"]."</td>
                                  <td>".$nreg["diciembre"]."</td>
                              </tr>");
                    }
                  ?>
                  </tbody>
                </table>
            </div>

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

            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/main.js"></script>
          </body>
      <?php
    }

    if ($vperiodo=="Ver por Año")
    {
      ?>
        <body>
          <div class="content">
            <div class="container">
                <div class="container-login100-form-btn-right">
                    <left><a class="login100-form-btn-center" href="menu-dir.php">Volver al menú</a></left>
                </div>
                <br>
              <h2 class="mb-5">Reportes de Ventas por Años</h2>
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar..." class=">
              <div class="table-responsive">
                <table class="table table-striped custom-table" id="myTable">
                  <thead>
                    <tr> 
                      <th scope="col">Id Venta</th>
                      <th scope="col">Razon Social</th>
                      <th scope="col">2018</th>
                      <th scope="col">2019</th>
                      <th scope="col">2020</th>
                      <th scope="col">2021</th>
                      <th scope="col">2022</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    

                    $sql = "exec sp_pivote";
                    $stmt=sqlsrv_query( $conn, $sql );

                    while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                    {
                        echo("<tr><td>".$nreg["idempresa"]."</td>
                                  <td>".$nreg["temprz"]."</td>
                                  <td>".$nreg["anio18"]."</td>
                                  <td>".$nreg["anio19"]."</td>
                                  <td>".$nreg["anio20"]."</td>
                                  <td>".$nreg["anio21"]."</td>
                                  <td>".$nreg["anio22"]."</td>
                              </tr>");
                    }
                  ?>
                  </tbody>
                </table>
            </div>

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

            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/main.js"></script>
          </body>
      <?php
    }

  ?>

  
</html>