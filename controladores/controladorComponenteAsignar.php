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

//include_once '../entidades/Componente.php';

include '../entidades/Componente.php';
$obj=new Componente();

$componenteasignar=NULL;
$estacionasignar=NULL;
$componenteasignar=$_REQUEST["componenteasignar"];

$estacionasignar=$_REQUEST["radioestacionasignar"];
$obj->actualizarcomponenteasignado($componenteasignar,$estacionasignar);
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><strong>Se asigno correctamente</strong></p>";

//$primero=explode(":",$estacion);
//$segundo1=$primero[0];
//$segundo2=$primero[1];
//$segundo3=$primero[2];
//$segundo4=$primero[3];
//$segundootro=$primero[4];
//$primero1=explode(",",$segundo2);
//$segundo5=$primero1[0];//Rafael
//$primero2=explode(",",$segundo3);
//$segundo6=$primero2[0];//puesto6
//$primero3=explode(",",$segundo4);
//$segundo7=$primero3[0];//3er nivel
//$primero4=explode(",",$segundootro);
//$segundo8=$primero4[0];//Informatica
//$final=$segundo5.$segundo6.$segundo7.$segundo8;
//$fecha=date("d-m-Y H:i:s");
//
//$marca=$marcacomponenteregistrar;
//if($red==''){
//return validarComponente($marca, $modelocomponente, $numeroseriecomponente, $numeroinventariocomponente,$estadocomponente,'Sin observaciones',$tipocomponente,$estacion,$fecha);
//}  else {
//    return validarComponentered($marca, $modelocomponente, $numeroseriecomponente, $numeroinventariocomponente,$estadocomponente,'Sin observaciones',$tipocomponente,$estacion,$fecha,$red);
//}
//function validarComponente($marca, $modelo, $numeroserie, $numeroinventario,$estado,$observaciones,$tipocomponente,$estacion,$fecha) {
//    if ($marca == "Seleccionar" || $numeroserie == NULL || $numeroinventario == NULL || $estado == NULL  || $tipocomponente == "Seleccionar"|| $estado == "Seleccionar" || $estacion =='Seleccionar') {
//       echo '<script language="javascript" type="text/javascript">
//
//            alert("Error al insertar en la base de datos")
//
//history.go(-1);
//
//</script>';
//    } else {
//        $obj = new Componente();
//$obj->insertar_componente($marca, $modelo, $numeroserie, $numeroinventario, $estado, $observaciones, $tipocomponente, $estacion,$fecha);
//            echo '<script language="javascript" type="text/javascript">
//
//            alert("Se inserto Correctamente")
//
//history.go(-1);
//
//</script>';
//
//    }
//}
//
//function validarComponentered($marca, $modelo, $numeroserie, $numeroinventario,$estado,$observaciones,$tipocomponente,$estacion,$fecha,$red) {
//    if ($marca == "Seleccionar" || $numeroserie == NULL || $numeroinventario == NULL || $estado == NULL  || $tipocomponente == "Seleccionar"|| $estado == "Seleccionar" || $estacion =='Seleccionar') {
//       echo '<script language="javascript" type="text/javascript">
//
//            alert("Error al insertar en la base de datos")
//
//history.go(-1);
//
//</script>';
//    } else {
//        $obj = new Componente();
//$obj->insertar_componente($marca, $modelo, $numeroserie, $numeroinventario, $estado, $observaciones, $tipocomponente, $estacion,$fecha,$red);
//            echo '<script language="javascript" type="text/javascript">
//
//            alert("Se inserto Correctamente")
//
//history.go(-1);
//
//</script>';
//
//    }
//}
?>











