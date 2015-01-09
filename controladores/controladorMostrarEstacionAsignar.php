<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
include '../modelo/ModeloLog.php';
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_estaciones();
$nombreregistrarrr = htmlspecialchars($_POST["opcionesestacionesasignar"]);

if($nombreregistrarrr!='Seleccionar'){


echo  "<table  width='100%' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";

foreach ($mostrar as $i) {
    $departamento = $i->departamento;

    if ($nombreregistrarrr==$departamento) {
 echo" <tr>
        <td style='width: 70px'><input type='radio' style='margin-left: 30px' name='radioestacionasignar' value='$i->nombreubicacionnickdepartamento' id='$i->nombreubicacionnickdepartamento'></td>
            <td style='width: 197px'><strong style='font-size:12px;'>$i->nombreestacion</strong></td>
<td style='width: 200px'><strong style='font-size:12px;'>$i->ubicacion</strong></td>
<td style='width: 200px'><strong style='font-size:12px;'>$i->nick</strong></td>
                <td style='width: 200px'><strong style='font-size:12px;'>$i->departamento</strong></td>
        </tr>";

    }
    
}
echo "</table>";
}
else {
   
    echo "<table  width='100%' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";
   
    foreach ($mostrar as $i) {

         echo" <tr>
        <td style='width: 70px'><input type='radio' style='margin-left: 30px' name='radioestacionasignar' value='$i->nombreubicacionnickdepartamento' id='$i->nombreubicacionnickdepartamento'></td>
            <td style='width: 196px'><strong style='font-size:12px;'>$i->nombreestacion</strong></td>
<td style='width: 200px'><strong style='font-size:12px;'>$i->ubicacion</strong></td>
<td style='width: 200px'><strong style='font-size:12px;'>$i->nick</strong></td>
                <td style='width: 200px'><strong style='font-size:12px;'>$i->departamento</strong></td>
        </tr>";
    }
    echo "</table>";
}
?>





