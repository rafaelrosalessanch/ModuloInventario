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
          $primero = $i->estacion;
          $tipo = $i->tipo;
                $segundo1 = explode("Departamento:", $primero);
        if ($compo==$numinventario ) {
           if ($tipo=="Computadora") {
           
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
        <tr style='height:-5px'>
        <td  style='font-size:12px;width:85px'><input type='radio' id='idcheckbox' name='idcheckbox' value='$i->numeroinventario' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 60px'></td>
                <td style='width: 112px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 112px'></td>
        <td style='width:104px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                
           }
        }
        
    
}












?>





