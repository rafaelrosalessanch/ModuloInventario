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
$nombreestado = htmlspecialchars($_POST["estadocomponenteregistrar"]);
$nombre = htmlspecialchars($_POST["tipocomponenteregistrar"]);
$marca = htmlspecialchars($_POST["marcacomponentemodificar"]);
$departamento = htmlspecialchars($_POST["departamentoconsultar"]);
if($marca==NULL){
   $marca='Seleccionar';
}
include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();



if ($nombre != "Seleccionar"||$departamento!= "Seleccionar" || $marca != "Seleccionar"|| $nombreestado != "Seleccionar") {
//    echo "<div id='iddiv' style='margin-top:10px'><strong><p style='font-size:12px'>Listados de componentes</p></strong></div>";
//    echo " <table width='850px' border='1' style=' border: 1px solid #000;
//                               border-collapse: collapse;
//                               padding: 0.3em;
//                               caption-side: bottom;'>
//         <tr style='background-image: url(/images/fondo.png)'>
//          <td style='width: 74px'><strong><p style='font-size:12px;color:white'>Seleccionar</p></strong></td>
//<td style='width: 75px'><strong><p style='font-size:12px;color:white'>Tipo</p></strong></td>
//<td style='width: 148px'><strong><p style='font-size:12px;color:white'>Marca</p></strong></td>
//         <td style='width:104px'><strong><p style='font-size:12px;color:white'>Modelo</p></strong></td>
//         <td style='width:144px'><strong><p style='font-size:12px;color:white'>Num serie</p></strong></td>
//         <td style='width: 144px'><strong><p style='font-size:12px;color:white'>Num Inventario</p></strong></td>
//         <td style='width:284px'><strong><p style='font-size:12px;color:white'>Observaciones</p></strong></td>
//         <td style='width: 54px'><strong><p style='font-size:12px;color:white'>Estado</p></strong></td>
//         </tr>
//         </table>";
    $bandera = "";
    $bandera2=0;
    foreach ($mostrar as $i) {
        $compo = $i->tipo;
        $compo1 = $i->marca;
        $compo2 = $i->estado;
         $primero = $i->estacion;
                $segundo1 = explode("Departamento:", $primero);
        if ($nombre != "Seleccionar" && $marca != "Seleccionar"&&$nombreestado!='Seleccionar'&&$departamento!='Seleccionar') {
            if (preg_match("/$nombre/", $compo)) {
                if (preg_match("/$marca/", $compo1)) {
                    if (preg_match("/$nombreestado/", $compo2)) {
if($departamento==$segundo1[1]){

              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
    <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                    $bandera = 1;
                    $bandera2++;
                }}}
            }
            $_SESSION['cantidadconsultados']=$bandera2;
        }
//        if ($nombre != "Seleccionar" && $marca == "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento!='Seleccionar') {
//            if (preg_match("/$nombre/", $compo)) {
//          if ($departamento==$segundo1[1]) {
//                echo "<table width='850px' border='1' style=';
//                               border-collapse: collapse;
//                               padding: 0.3em;
//                               caption-side: bottom;'>
//        <tr style='height:-5px'>
//        <td  style='font-size:12px;width:85px'><input type='radio' id='idcheckbox' name='idcheckbox' value='$i->numeroinventario' style='font-size:12px;width:100%;height: 100%'></td>
//        <td style='width: 60px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 60px'></td>
//                <td style='width: 112px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 112px'></td>
//        <td style='width:104px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
//        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
//        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
//        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
//        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
//                </tr>
//                </table>";
//                $bandera = 1;
//                $bandera2++;
//            }}
//            $_SESSION['cantidadconsultados']=$bandera2;
//        }
//        if ($nombre != "Seleccionar" && $marca == "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento=='Seleccionar') {
//            if (preg_match("/$nombre/", $compo)) {
//
//                echo "<table width='850px' border='1' style=';
//                               border-collapse: collapse;
//                               padding: 0.3em;
//                               caption-side: bottom;'>
//        <tr style='height:-5px'>
//        <td  style='font-size:12px;width:85px'><input type='radio' id='idcheckbox' name='idcheckbox' value='$i->numeroinventario' style='font-size:12px;width:100%;height: 100%'></td>
//        <td style='width: 60px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 60px'></td>
//                <td style='width: 112px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 112px'></td>
//        <td style='width:104px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
//        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
//        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
//        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
//        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
//                </tr>
//                </table>";
//                $bandera = 1;
//                $bandera2++;
//            }
//            $_SESSION['cantidadconsultados']=$bandera2;
//        }
          if ($nombre != "Seleccionar" && $marca != "Seleccionar"&&$nombreestado!='Seleccionar'&&$departamento=='Seleccionar') {
            if (preg_match("/$nombre/", $compo)) {
                if (preg_match("/$marca/", $compo1)) {
                    if (preg_match("/$nombreestado/", $compo2)) {

              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
        <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                    $bandera = 1;
                    $bandera2++;
                }}
            }
            $_SESSION['cantidadconsultados']=$bandera2;
        }
         if ($nombre != "Seleccionar" && $marca != "Seleccionar"&& $nombreestado=='Seleccionar'&& $departamento=='Seleccionar') {
            if (preg_match("/$nombre/", $compo)) {
                if (preg_match("/$marca/", $compo1)) {
                   

              echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
     <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                    $bandera = 1;
                    $bandera2++;
                }}
            $_SESSION['cantidadconsultados']=$bandera2;
        }
        if ($nombre == "Seleccionar" && $marca != "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento=='Seleccionar') {
            if (preg_match("/$marca/", $compo1)) {
echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
       <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }
            $_SESSION['cantidadconsultados']=$bandera2;
        }
         if ($nombre == "Seleccionar" && $marca != "Seleccionar"&& $nombreestado != "Seleccionar"&& $departamento=='Seleccionar') {
            if (preg_match("/$marca/", $compo1)) {
                if (preg_match("/$nombreestado/", $compo2)) {

echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
   <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }
        }  
        $_SESSION['cantidadconsultados']=$bandera2;
        }








          if ($nombre != "Seleccionar" && $marca == "Seleccionar"&& $nombreestado != "Seleccionar"&& $departamento=='Seleccionar') {
            if (preg_match("/$nombre/", $compo)) {
                if (preg_match("/$nombreestado/", $compo2)) {

echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
     <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }
        }  
        $_SESSION['cantidadconsultados']=$bandera2;
        }
        if ($nombre != "Seleccionar" && $marca == "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento=='Seleccionar') {
            if (preg_match("/$nombre/", $compo)) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
        <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }
            $_SESSION['cantidadconsultados']=$bandera2;
        }
           if ($nombre == "Seleccionar" && $marca == "Seleccionar"&& $nombreestado != "Seleccionar"&& $departamento=='Seleccionar') {
            if (preg_match("/$nombreestado/", $compo2)) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
     <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }
            $_SESSION['cantidadconsultados']=$bandera2;
        }

        if ($nombre == "Seleccionar" && $marca == "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento!='Seleccionar') {
            if ($departamento==$segundo1[1]) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
      <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }
            $_SESSION['cantidadconsultados']=$bandera2;
        }





      if ($nombre != "Seleccionar" && $marca == "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento!='Seleccionar') {
            if (preg_match("/$nombre/", $compo)) {
          if ($departamento==$segundo1[1]) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
       <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }}
            $_SESSION['cantidadconsultados']=$bandera2;
        }

        if ($nombre == "Seleccionar" && $marca != "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento!='Seleccionar') {
            if (preg_match("/$marca/", $compo1)) {
          if ($departamento==$segundo1[1]) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
     <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }}
            $_SESSION['cantidadconsultados']=$bandera2;
        }
          if ($nombre != "Seleccionar" && $marca != "Seleccionar"&& $nombreestado == "Seleccionar"&& $departamento!='Seleccionar') {
            if (preg_match("/$nombre/", $compo)) {
              if (preg_match("/$marca/", $compo1)) {

          if ($departamento==$segundo1[1]) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
       <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }}}
            $_SESSION['cantidadconsultados']=$bandera2;
        }

        if ($nombre == "Seleccionar" && $marca == "Seleccionar"&& $nombreestado != "Seleccionar"&& $departamento!='Seleccionar') {
            if (preg_match("/$nombreestado/", $compo2)) {
          if ($departamento==$segundo1[1]) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
      <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }}
            $_SESSION['cantidadconsultados']=$bandera2;
        }
      if ($nombre != "Seleccionar" && $marca == "Seleccionar"&& $nombreestado != "Seleccionar"&& $departamento!='Seleccionar') {
           if (preg_match("/$nombre/", $compo)) {
          if (preg_match("/$nombreestado/", $compo2)) {
          if ($departamento==$segundo1[1]) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
       <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }}
        }
        $_SESSION['cantidadconsultados']=$bandera2;
        }


         if ($nombre == "Seleccionar" && $marca != "Seleccionar"&& $nombreestado != "Seleccionar"&& $departamento!='Seleccionar') {

             if (preg_match("/$marca/", $compo1)) {
          if (preg_match("/$nombreestado/", $compo2)) {
          if ($departamento==$segundo1[1]) {
                echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
    <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
                $bandera = 1;
                $bandera2++;
            }}
        }
        $_SESSION['cantidadconsultados']=$bandera2;
        }
    }
  
} else {

//    echo "<div id='iddiv' style='margin-top:10px'><strong><p style='font-size:12px'>Listados de componentes</p></strong></div>";
//    echo " <table width='850px' border='1' style=' border: 1px solid #000;
//                               border-collapse: collapse;
//                               padding: 0.3em;
//                               caption-side: bottom;'>
//         <tr style='background-image: url(/images/fondo.png)'>
//          <td style='width: 74px'><strong><p style='font-size:12px;color:white'>Seleccionar</p></strong></td>
//<td style='width: 75px'><strong><p style='font-size:12px;color:white'>Tipo</p></strong></td>
//<td style='width: 148px'><strong><p style='font-size:12px;color:white'>Marca</p></strong></td>
//         <td style='width:104px'><strong><p style='font-size:12px;color:white'>Modelo</p></strong></td>
//         <td style='width:144px'><strong><p style='font-size:12px;color:white'>Num serie</p></strong></td>
//         <td style='width: 144px'><strong><p style='font-size:12px;color:white'>Num Inventario</p></strong></td>
//         <td style='width:284px'><strong><p style='font-size:12px;color:white'>Observaciones</p></strong></td>
//         <td style='width: 54px'><strong><p style='font-size:12px;color:white'>Estado</p></strong></td>
//         </tr>
//         </table>";
    $bandera = "";
    $bandera2=0;
    $_SESSION['cantidadconsultados']=0;
    $_SESSION['tipoconsultados']='Total de activos:';
    foreach ($mostrar as $i) {
        $compo = $i->tipo;
        $primero = $i->estacion;
                $segundo1 = explode("Departamento:", $primero);
        echo "<table width='840px' border='1' style=';
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;'>
       <tr style='height:-5px'>
        <td style='width: 64px'><input id='modificartipo' name='modificartipo' type='text' value='$i->tipo' style='font-size:12px;width: 64px'></td>
                <td style='width: 126px'><input id='modificarmarca' name='modificarmarca' type='text' value='$i->marca' style='font-size:12px;width: 125px'></td>
        <td style='width:105px;height: 100%'><input id='modificarmodelo' name='modificarmodelo' type='text' value='$i->modelo' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width:136px'><input id='modificarnumserie' name='modificarnumserie' type='text'value='$i->numserie' style='font-size:12px;width:100%;height:100%'></td>
        <td style='width: 148px'><input id='modificarnumeroinventario' name='modificarnumeroinventario' type='text' value='$i->numeroinventario' style='font-size:12px;width: 100%;height: 100%'></td>
        <td  style='font-size:12px;width:279px'><input type='text' value='$segundo1[1]' style='font-size:12px;width:100%;height: 100%'></td>
        <td style='width: 60.5px'><input type='text'value='$i->estado' style='font-size:12px;width: 100%;height: 100%' ></td>
                </tr>
                </table>";
$bandera2++;
        $bandera = 1;
    }

    $_SESSION['cantidadconsultados']=$bandera2;
}












?>





