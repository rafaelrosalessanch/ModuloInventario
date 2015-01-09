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
session_start();
$obj=new ModeloLog();
$mostrar=$obj->mostrar_usuarios_todoos();
echo  "<table  width='840px' border='2' style=' border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;'>";
foreach ($mostrar as $i) {
  if($i->estado==1){
      $estado='Habilitado'; }  else {
        $estado='Deshabilitado';
    }
   echo" <tr>
        <td style='width: 68px'><input name='opcionesusuario' style='width:95%' type='radio' value='$i->usuario'></input></td>
            <td style='width: 76px'><input style='width:95%' type='text' value='$i->usuario'></input></td>
<td style='width: 149px'><input style='width:97%' type='text' value='$i->departamento'></input></td>
       
        <td style='width: 145px'><input style='width:97%' type='text' value='$i->administracion'></input></td>
               <td style='width: 52px'><input style='width:93%' type='text' value='$i->jefes'></input></td>
<td style='width: 52px'><input style='width:93%' type='text' value='$estado'></input></td>
        
        </tr>";


}
echo "</table>";
?>





