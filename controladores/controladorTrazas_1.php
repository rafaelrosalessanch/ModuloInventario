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
$resultado = htmlspecialchars($_POST["estadocomponenteregistrar"]);
if($marca==NULL){
   $marca='Seleccionar';
}
include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_trazas();



if ($nombre == "Seleccionar" && $marca == "Seleccionar"&&$resultado=="Seleccionar") {
   
    $bandera = "";
    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $resultado=$i->retorno;
        $fecha=$i->fecha_accion;
        
               
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
        <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>
               </tr>
                </table>";
                    $bandera = 1;
                
    }}  else {
        if ($nombre != "Seleccionar" && $marca == "Seleccionar"&&$resultado=="Seleccionar") {

    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
         $resultado=$i->retorno;
        $fecha=$i->fecha_accion;

               if($usuario==$nombre){
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
                   <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
               <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>

                   </tr>
                </table>";
                    $bandera = 1;}

    }}
    if ($nombre == "Seleccionar" && $marca != "Seleccionar"&&$resultado=="Seleccionar") {

    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultado=$i->retorno;
               if($accion==$marca){
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
                  <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
               <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>

                   </tr>
                </table>";
                    $bandera = 1;}

    }

    }
       if ($nombre != "Seleccionar" && $marca != "Seleccionar"&&$resultado=="Seleccionar") {

    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultado=$i->retorno;
               if($accion==$marca&&$usuario==$nombre){
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
                   <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
               <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>

                   </tr>
                </table>";
                    $bandera = 1;}

    }

    }
















     if ($nombre != "Seleccionar" && $marca != "Seleccionar"&&$resultado!="Seleccionar") {

    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultadoo=$i->retorno;
               if($resultadoo==$resultado&&$marca==$accion&&$nombre==$usuario){
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
                   <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
               <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>

                   </tr>
                </table>";
                    $bandera = 1;}

    }

    }
     if ($nombre != "Seleccionar" && $marca == "Seleccionar"&&$resultado!="Seleccionar") {

    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultadoo=$i->retorno;
               if($resultadoo==$resultado&&$nombre==$usuario){
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
                   <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
               <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>

                   </tr>
                </table>";
                    $bandera = 1;}

    }

    }
    if ($nombre == "Seleccionar" && $marca != "Seleccionar"&&$resultado!="Seleccionar") {

    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultadoo=$i->retorno;
               if($resultadoo==$resultado&&$marca==$accion){
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
                   <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
               <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>

                   </tr>
                </table>";
                    $bandera = 1;}

    }

    }
    if ($nombre == "Seleccionar" && $marca == "Seleccionar"&&$resultado!="Seleccionar") {

    foreach ($mostrar as $i) {
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultadoo=$i->retorno;
               if($resultadoo==$resultado){
              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
 <tr style='height:-5px'>
                   <td style='width: 10px'><input type='checkbox' id='$i->idtraza' name='numero[]' value='$i->idtraza' ></td>
        <td style='width: 52px'><input id='modificartipo' name='modificartipo' type='text' value='$usuario' style='font-size:12px;width: 100%'></td>
                <td style='width: 150px'><input id='modificarmarca' name='modificarmarca' type='text' value='$accion' style='font-size:12px;width: 100%'></td>
        <td style='width:140px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$tipocomponente' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:96px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$numeroinventario' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$fecha' style='font-size:12px;width: 100%;height: 100%'></td>
               <td style='width: 136px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$resultado' style='font-size:12px;width: 100%;height: 100%'></td>

                   </tr>
                </table>";
                    $bandera = 1;}

    }

    }


}


?>





