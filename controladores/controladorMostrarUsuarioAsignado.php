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
$obj= new ModeloLog();
$extract = extract($_GET);
$departamento = htmlspecialchars($_POST["opcionesdepartamentousuario"]);
$_SESSION['departamentoeliminarusuario']=$departamento;
$bandera=0;
if($departamento!='Seleccionar'){
$mostrar=$obj->mostrar_usuarios_departamento($departamento);
 echo "<option>Seleccionar</option>";
foreach ($mostrar as $i) {
    $bandera=1;
    echo "<option>$i->usuario</option>";
     }
     if($bandera==0)
       echo "<option>Sin resultados</option>";}
else {
    echo "<option>Seleccionar</option>";
}
//if($nombreregistrarrrasignar!='Seleccionar'){
//$departamentoasignar='Departamento:Almacen';
//$mostrar = $objregistrarasignar->mostrar_todos_los_componentes();
//
//echo  "<table  width='100%' border='2' style=' border: 1px solid #000;
//   border-collapse: collapse;
//   padding: 0.3em;
//   caption-side: bottom;'>";
//
//foreach ($mostrar as $i) {
//    $departamento = $i->estacion;
//       $tipo = $i->tipo;
// if ($nombreregistrarrrasignar==$tipo) {
//    if (preg_match("/$departamentoasignar/", $departamento)) {
//echo" <tr>
//        <td style='width: 15px'><input type='radio' style='margin-left: 40px' name='radiocomponenteasignar' value='$i->numeroinventario' id='$i->numeroinventario'></td>
//            <td style='width: 104px'><strong style='font-size:12px;'>$i->tipo</strong></td>
//<td style='width: 106px'><strong style='font-size:12px;'>$i->marca</strong></td>
//<td style='width: 109px'><strong style='font-size:12px;'>$i->modelo</strong></td>
//        <td style='width: 112px'><strong style='font-size:12px;'>$i->numeroinventario</strong></td>
//        <td style='width: 107.8px'><strong style='font-size:12px;'>$i->estado</strong></td>
//        </tr>";
//
//    }
//
//}}
//echo "</table>";
//}
// else {
//    $departamentoasignar='Departamento:Almacen';
//$mostrar = $objregistrarasignar->mostrar_todos_los_componentes();
//
//echo  "<table  width='100%' border='2' style=' border: 1px solid #000;
//   border-collapse: collapse;
//   padding: 0.3em;
//   caption-side: bottom;'>";
//
//foreach ($mostrar as $i) {
//    $departamento = $i->estacion;
//
//    if (preg_match("/$departamentoasignar/", $departamento)) {
//echo" <tr>
//        <td style='width: 15px'><input type='radio' style='margin-left: 40px' name='radiocomponenteasignar' value='$i->numeroinventario' id='$i->numeroinventario'></td>
//            <td style='width: 104px'><strong style='font-size:12px;'>$i->tipo</strong></td>
//<td style='width: 106px'><strong style='font-size:12px;'>$i->marca</strong></td>
//<td style='width: 109px'><strong style='font-size:12px;'>$i->modelo</strong></td>
//        <td style='width: 112px'><strong style='font-size:12px;'>$i->numeroinventario</strong></td>
//        <td style='width: 107.8px'><strong style='font-size:12px;'>$i->estado</strong></td>
//        </tr>";
//
//    }
//
//}
//echo "</table>";
//}
?>





