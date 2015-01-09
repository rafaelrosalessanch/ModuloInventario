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

$marca = htmlspecialchars($_POST["marcacomponentemodificar"]);
if($marca==NULL){
   $marca='Seleccionar';
}
include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();



if ($marca != "Seleccionar") {
   
    $bandera = "";
    foreach ($mostrar as $i) {
        $numeroinventario=$i->numeroinventario;
        $tipo=$i->tipo;
        $marca=$i->marca;
        $modelo=$i->modelo;
        $numeroserie=$i->numserie;
        $observaciones=$i->observaciones;
        $estado=$i->estado;
        $compo = $i->tipo;
        $compo1 = $i->marca;
        if ($marca != "Seleccionar") {
       
                if (preg_match("/$marca/", $compo1)) {

                if($tipo=='Computadora'){
              echo "<table width='850px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
        <tr style='height:-5px'>
        <td  style='font-size:12px;width:85px'><input type='radio' id='idcheckbox' name='idcheckbox' value='$numeroinventario' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60px'><input id='modificartipo' name='modificartipo' type='text' value='$tipo' style='font-size:12px;width: 60px'></td>
                <td style='width: 112px'><input id='modificarmarca' name='modificarmarca' type='text' value='$marca' style='font-size:12px;width: 112px'></td>
        <td style='width:104px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$observaciones' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                    $bandera = 1;}
                
            }
        }
      
        
    }
  
} else {

   
    $bandera = "";
    foreach ($mostrar as $i) {
        $numeroinventario=$i->numeroinventario;
        $tipo=$i->tipo;
        $marca=$i->marca;
        $modelo=$i->modelo;
        $numeroserie=$i->numserie;
        $observaciones=$i->observaciones;
        $estado=$i->estado;
        $compo = $i->tipo;
         if($tipo=='Computadora'){
        echo "<table width='850px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
        <tr style='height:-5px'>
        <td  style='font-size:12px;width:85px'><input type='radio' id='idcheckbox' name='idcheckbox' value='$numeroinventario' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60px'><input id='modificartipo' name='modificartipo' type='text' value='$tipo' style='font-size:12px;width: 60px'></td>
                <td style='width: 112px'><input id='modificarmarca' name='modificarmarca' type='text' value='$marca' style='font-size:12px;width: 112px'></td>
        <td style='width:104px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$observaciones' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";

        $bandera = 1;
    }}
    
}












?>





