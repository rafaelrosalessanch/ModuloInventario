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
$nombreregistrarrr = htmlspecialchars($_POST["opcionesestaciones"]);

if ($nombreregistrarrr != 'Seleccionar') {

   
     echo "<table  width='840px' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";
 
    foreach ($mostrar as $i) {
        $departamento = $i->departamento;

        if ($nombreregistrarrr == $departamento) {
           echo" <tr>
        <td style='width: 70px'><input type='radio' style='margin-left: 30px' name='radio' value='$i->nombreubicacionnickdepartamento' id='$i->nombreubicacionnickdepartamento'></td>
            <td style='width: 200px'><input style='width: 97%' type='text' value='$i->nombreestacion'></input></td>
<td style='width: 200px'><input style='width: 97%' type='text' value='$i->ubicacion'></input></td>
<td style='width: 200px'><input style='width: 97%' type='text' value='$i->nick'></input></td>
                <td style='width: 200px'><input style='width: 97%' type='text' value='$i->departamento'></input></td>
        </tr>";
        }
    }
    echo "</table>";
} else {
    
    echo "<table  width='840px' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";
 
    foreach ($mostrar as $i) {

        echo" <tr>
        <td style='width: 70px'><input type='radio' style='margin-left: 30px' name='radio' value='$i->nombreubicacionnickdepartamento' id='$i->nombreubicacionnickdepartamento'></td>
            <td style='width: 197px'><input style='width: 97%' type='text' value='$i->nombreestacion'></input></td>
<td style='width: 198px'><input style='width: 97%' type='text' value='$i->ubicacion'></input></td>
<td style='width: 198px'><input style='width: 97%' type='text' value='$i->nick'></input></td>
                <td style='width: 198px'><input style='width: 97%' type='text' value='$i->departamento'></input></td>
        </tr>";
    }
    echo "</table>";
}
?>





