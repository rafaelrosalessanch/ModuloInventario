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
$mostrar = $objregistrar->mostrar_departamentos();

foreach ($mostrar as $i) {

// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
 
echo  "<table  width='840px' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";


   echo" <tr>
        <td style='width: 40px'><input name='orderBox' style='width:95%' type='radio' value='$i->nombredepartamento'></input></td>
            <td style='width: 149px'><input style='width:98%' type='text' value='$i->nombredepartamento'></input></td>
<td style='width: 74px'><input style='width:97%' type='text' value='$i->ubicaciondepartamento'></input></td>

        <td style='width: 145px'><input style='width:98%' type='text' value='$i->area'></input></td>
            

        </tr>";

}

echo "</table>";

?>





