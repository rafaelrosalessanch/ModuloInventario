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
$nombre = htmlspecialchars($_POST["tipocomponenteregistrar"]);
$marca = htmlspecialchars($_POST["marcacomponentemodificar"]);
if($marca==NULL){
   $marca='Seleccionar';
}
include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();



if ($nombre != "Seleccionar" || $marca != "Seleccionar") {
    echo "<div id='iddiv' style='margin-top:10px'><strong><p style='font-size:12px'>Listados de componentes</p></strong></div>";
    echo " <table width='850px' border='1' style=' border: 1px solid #000;
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
         <tr style='background-image: url(/images/fondo.png)'>
          <td style='width: 74px'><strong><p style='font-size:12px;color:white'>Seleccionar</p></strong></td>
<td style='width: 75px'><strong><p style='font-size:12px;color:white'>Tipo</p></strong></td>
<td style='width: 148px'><strong><p style='font-size:12px;color:white'>Marca</p></strong></td>
         <td style='width:104px'><strong><p style='font-size:12px;color:white'>Modelo</p></strong></td>
         <td style='width:144px'><strong><p style='font-size:12px;color:white'>Num serie</p></strong></td>
         <td style='width: 144px'><strong><p style='font-size:12px;color:white'>Num Inventario</p></strong></td>
         <td style='width:284px'><strong><p style='font-size:12px;color:white'>Observaciones</p></strong></td>
         <td style='width: 54px'><strong><p style='font-size:12px;color:white'>Estado</p></strong></td>
         </tr>
         </table>";
    $bandera = "";
    foreach ($mostrar as $i) {
        $compo = $i->tipo;
        $compo1 = $i->marca;
        if ($nombre != "Seleccionar" && $marca != "Seleccionar") {
            if (preg_match("/$nombre/", $compo)) {
                if (preg_match("/$marca/", $compo1)) {
              echo "<table width='850px' border='1' style=';
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
        <td  style='font-size:12px;width:279px'><input type='text' value='$i->observaciones' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                    $bandera = 1;
                }
            }
        }
        if ($nombre == "Seleccionar" && $marca != "Seleccionar") {
            if (preg_match("/$marca/", $compo1)) {
echo "<table width='850px' border='1' style=';
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
        <td  style='font-size:12px;width:279px'><input type='text' value='$i->observaciones' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
            }
        }
        if ($nombre != "Seleccionar" && $marca == "Seleccionar") {
            if (preg_match("/$nombre/", $compo)) {
                echo "<table width='850px' border='1' style=';
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
        <td  style='font-size:12px;width:279px'><input type='text' value='$i->observaciones' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
            }
        }
    }
  
} else {

    echo "<div id='iddiv' style='margin-top:10px'><strong><p style='font-size:12px'>Listados de componentes</p></strong></div>";
    echo " <table width='850px' border='1' style=' border: 1px solid #000;
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
         <tr style='background-image: url(/images/fondo.png)'>
          <td style='width: 74px'><strong><p style='font-size:12px;color:white'>Seleccionar</p></strong></td>
<td style='width: 75px'><strong><p style='font-size:12px;color:white'>Tipo</p></strong></td>
<td style='width: 148px'><strong><p style='font-size:12px;color:white'>Marca</p></strong></td>
         <td style='width:104px'><strong><p style='font-size:12px;color:white'>Modelo</p></strong></td>
         <td style='width:144px'><strong><p style='font-size:12px;color:white'>Num serie</p></strong></td>
         <td style='width: 144px'><strong><p style='font-size:12px;color:white'>Num Inventario</p></strong></td>
         <td style='width:284px'><strong><p style='font-size:12px;color:white'>Observaciones</p></strong></td>
         <td style='width: 54px'><strong><p style='font-size:12px;color:white'>Estado</p></strong></td>
         </tr>
         </table>";
    $bandera = "";
    foreach ($mostrar as $i) {
        $compo = $i->tipo;
        echo "<table width='850px' border='1' style=';
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
        <td  style='font-size:12px;width:279px'><input type='text' value='$i->observaciones' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";

        $bandera = 1;
    }
    
}












?>





