<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author rafael
 */
session_start();
$resultado = "";
$numinventario = htmlspecialchars($_POST["buttonfiltrarpornuminventario"]);


include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();




    $bandera = "";
    foreach ($mostrar as $i) {
        $compo = $i->numeroinventario;
          $numeroinventario=$i->numeroinventario;
       
        $primero=$i->estacion;
   
         $segundo1 = explode("Departamento:", $primero);
                $segundo2=explode("Estacion:", $segundo1[0]);
                $segundo4=explode("Ubicacion:", $segundo1[0]);
                 $segundo5=explode("Estacion:", $segundo4[0]);
                $segundo3=explode("Trabajador:", $segundo2[0]);
        if ($compo==$numinventario ) {
           
           
             
       echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
         <tr style='height:-5px'>
<td style='width: 85px'><input type='radio' style='margin-left:30px'  name='radiocomponenteasignar' value='$i->numeroinventario' id='$i->numeroinventario'></td>  <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 85px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 85px'></td>
       <td style='width: 153px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td style='width: 127px'><input id='modificarnumeroserie' name='modificarnumeroserie' type='text' value='$i->numserie' style='font-size:12px;width: 100%;height: 100%'></td>

                <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                 <td style='width:115px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$segundo3[1]' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:140px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$segundo5[1]' style='font-size:12px;width:100%;height:100%'></td>

                <td  style='font-size:12px;width:294px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>

                </tr>
                </table>";
                
              
        }
        
    
}












?>





