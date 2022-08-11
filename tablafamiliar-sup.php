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

    <title>Tabla Familiares - Supervisor</title>
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

    $query = "SELECT ifamiliar, nombre FROM familiar WHERE estatus=1";
    $consulta1 = sqlsrv_query( $conn, $query );
  ?>
  <body>
  <div class="content">
    <div class="container">
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn-center" href="menu-sup.php">Volver al menú</a></left>
      </div>
      <br>
      <br>
      <h2 class="mb-5">Familiares</h2>
      <form action="bajafamiliar-form.php" method="POST">
            <select class="input100-select-noborder wrap-input100-delete" name="ifamiliar" id="ifamiliar"><br>
                <option value="0">Selecciona el elemento que deseas eliminar</option>
                <?php while( $row = sqlsrv_fetch_array( $consulta1, SQLSRV_FETCH_ASSOC) ) {?>
                    <option value="<?php echo $row['ifamiliar']; ?>"><?php echo $row['nombre']; ?></option>
                <?php } sqlsrv_free_stmt( $consulta1);?>
                <br>
            </select>  
            <button class="login100-form-btn"> Borrar</button>
            <!--<input class="login100-form-btn" type="submit" value="Borrar">-->
            <br>
            <br>
      </form>
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

            $sql = "SELECT ifamiliar, c.nombre AS nombrepers, tipoparenteso, a.nombre AS nombrefam, apellidop, apellidom, CAST(a.fnacimiento AS varchar) AS fnacfam 
            FROM familiar a
            INNER JOIN parentesco b ON a.iparentesco=b.iparentesco
            INNER JOIN Persona c ON a.ipersona=c.ipersona
            WHERE a.estatus =1";
            // 18
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
      <br><br>
      <div class="container-login100-form-btn-right">
        <left><a class="login100-form-btn" href="editarfamiliar-sup.php">Editar Familiar</a></left>
      </div>
    </div>
  </div>
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>