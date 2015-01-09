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
$mostrar = $objregistrar->mostrar_usuarios();
$nombreregistrarrr = htmlspecialchars($_POST["opcionesestaciones"]);

if ($nombreregistrarrr != 'Seleccionar') {


    echo "<table  width='100%' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";

    foreach ($mostrar as $i) {
        $departamento = $i->departamento;

        if ($nombreregistrarrr == $departamento) {
    echo" <tr>
        <td style='width: 7.9%'><input type='checkbox' style='margin-left: 30px' name='numero[]' value='$i->ci' id='$i->ci'></td>
            <td style='width: 20%'><strong style='font-size:12px;'>$i->nombreusuario</strong></td>
<td style='width: 20.2%'><strong style='font-size:12px;'>$i->ci</strong></td>
<td style='width: 20.2%'><strong style='font-size:12px;'>$i->departamento</strong></td>
        <td style='width: 20%'><strong style='font-size:12px;'>$i->cargo</strong></td>
        </tr>";
    }}
    echo "</table>";
} else {

    echo "<table  width='100%' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";

    foreach ($mostrar as $i) {

       echo" <tr>
        <td style='width: 7.9%'><input type='checkbox' style='margin-left: 30px' name='numero[]' value='$i->ci' id='$i->ci'></td>
            <td style='width: 20%'><strong style='font-size:12px;'>$i->nombreusuario</strong></td>
<td style='width: 20.2%'><strong style='font-size:12px;'>$i->ci</strong></td>
<td style='width: 20.2%'><strong style='font-size:12px;'>$i->departamento</strong></td>
        <td style='width: 20%'><strong style='font-size:12px;'>$i->cargo</strong></td>
        </tr>";
    }
    echo "</table>";
}
?>