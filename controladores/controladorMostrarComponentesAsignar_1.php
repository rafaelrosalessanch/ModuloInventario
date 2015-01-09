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
$objregistrarasignar = new ModeloLog();
$extract = extract($_GET);

$departamentoasignar='Departamento:Almacen';
$mostrar = $objregistrarasignar->mostrar_todos_los_componentes();

echo  "<table  width='100%' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";

foreach ($mostrar as $i) {
    $departamento = $i->estacion;

    if (preg_match("/$departamentoasignar/", $departamento)) {
echo" <tr>
        <td style='width: 15px'><input type='radio' style='margin-left: 40px' name='radiocomponenteasignar' value='$i->numeroinventario' id='$i->numeroinventario'></td>
            <td style='width: 104px'><strong style='font-size:12px;'>$i->tipo</strong></td>
<td style='width: 106px'><strong style='font-size:12px;'>$i->marca</strong></td>
<td style='width: 109px'><strong style='font-size:12px;'>$i->modelo</strong></td>
        <td style='width: 112px'><strong style='font-size:12px;'>$i->numeroinventario</strong></td>
        <td style='width: 107.8px'><strong style='font-size:12px;'>$i->estado</strong></td>
        </tr>";

    }

}
echo "</table>";

?>





