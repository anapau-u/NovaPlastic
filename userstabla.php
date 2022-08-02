<?php
    while ($nreg=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
    {
        echo("<tr><td>".$nreg["iusuarios"]."</td>
                    <td>".$nreg["usuario"]."</td>
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
                    <td>".$nreg["estatus"]."</td>
                    <td>".$nreg["falta"]."</td>
                    <td>".$nreg["iusuarios"]."</td>  
                </tr>");

                // $nreg["iusuarios"], 
                // $nreg["usuario"], 
                // $nreg["nombre"], 
                // $nreg["apaterno"], 
                // $nreg["amaterno"], 
                // $nreg["fnacimiento"], 
                // $nreg["puesto"], 
                // $nreg["telefono"], 
                // $nreg["pais"], 
                // $nreg["estado"], 
                // $nreg["municipio"], 
                // $nreg["colonia"],
                // $nreg["calle"],
                // $nreg["numeroint"],
                // $nreg["numeroext"],
                // $nreg["codpostal"],
                // $nreg["estatus"],
                // $nreg["falta"],
                // $nreg["iusuarios"]);

                // &nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
                    // <td>&nbsp;%s&nbsp;</td>
    }
?>