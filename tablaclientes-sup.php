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
  <?php
    // 172.16.22.106 escuela  
    // 192.168.100.52 casa Pam
    $serverName = "172.16.22.106, 1433";
    $connectionInfo = array("Database"=>"JAAPA", "UID"=>"JAAPAPAM", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );
  
    if( $conn === false ) {
      die( print_r( sqlsrv_errors(), true));
    }

    $sql = "SELECT iempresa, razonsocial FROM Empresa";
    $stmt = sqlsrv_query( $conn, $sql );
  ?>
  <body>
  <div class="content">
    <div class="container">
      <h2 class="mb-5">Clientes</h2>
      <div class="container-login100-form-btn-right">
      <right><a class="login100-form-btn" href="menu-cap.html">Regresar al Menú</a></right>
        
      <form action="bajacliente-form.php" method="POST">
        <br>
        
        <!-- <div class="wrap-input100" > -->
          <left>
          <span class="focus-input100"></span>
          <span class="label-input100"></span>
          <select class="input100-select"  name="iempresa" id="iempresa"><br>
              <option value="0">Selecciona el elemento que deseas eliminar</option>
              <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                  <option value="<?php echo $row['iempresa']; ?>"><?php echo $row['razonsocial']; ?></option>
              <?php } sqlsrv_free_stmt( $stmt);?>
          </select>
          <br>
          <input class="login100-form-btn" type="submit" value="Borrar">
          <left>
        <!-- </div> -->
        </form>

      </div>
      <br>
      <br>
      <br><br>
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr> 
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

            $sql2 = "SELECT razonsocial, telefono, pais, estado, municipio, colonia, calle, 
            numeroint, numeroext, codpostal FROM Empresa WHERE estatus = 1";
            $stmt2=sqlsrv_query( $conn, $sql2 );

            while ($nreg=sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))
            {
              echo("<tr><td>".$nreg["razonsocial"]."</td>
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
      <br><br>
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn" href="editarcliente-sup.php">Editar Cliente</a></left>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>