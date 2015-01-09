<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */


error_reporting(E_ALL ^ E_NOTICE);
session_start();
//$marca=NULL;
//$modelocomponente=NULL;
//$numeroseriecomponente=NULL;
//$numeroinventariocomponente=NULL;
//$estadocomponente=NULL;
//$tipocomponente=NULL;
//$estacion=NULL;
//$fecha=NULL;
//$red=NULL;
include_once '../entidades/Componente.php';
include_once '../modelo/ModeloLog.php';
$obj=new ModeloLog();
$seleccionadostipocpu = $_POST['tipocpu'];
for($i=0; $i < count($seleccionadostipocpu); $i++){
    $obj->eliminar_tipo_cpu($seleccionadostipocpu[$i]);


}
$seleccionadostipocpu = $_POST['tipocpu'];
for($i=0; $i < count($seleccionadostipocpu); $i++){
    $obj->eliminar_tipo_cpu($seleccionadostipocpu[$i]);


}
$seleccionadosvelocidadcpu = $_POST['velocidadcpu'];
for($i=0; $i < count($seleccionadosvelocidadcpu); $i++){
    $obj->eliminar_velocidad_cpu($seleccionadosvelocidadcpu[$i]);


}
$seleccionadosmarcahdd = $_POST['marcahdd'];
for($i=0; $i < count($seleccionadosmarcahdd); $i++){
    $obj->eliminar_marca_hdd($seleccionadosmarcahdd[$i]);


}
$seleccionadoscapacidadhdd = $_POST['capacidadhdd'];
for($i=0; $i < count($seleccionadoscapacidadhdd); $i++){
    $obj->eliminar_capacidad_hdd($seleccionadoscapacidadhdd[$i]);


}

$seleccionadostiporam = $_POST['tiporam'];
for($i=0; $i < count($seleccionadostiporam); $i++){
    $obj->eliminar_tipo_ram($seleccionadostiporam[$i]);


}

$seleccionadoscapacidadram = $_POST['capacidadram'];
for($i=0; $i < count($seleccionadoscapacidadram); $i++){
    $obj->eliminar_capacidad_ram($seleccionadoscapacidadram[$i]);


}



$seleccionadosmarcageneral = $_POST['marcageneral'];
$mostrarmarcaobjetos=$obj->mostrar_todos_los_componentes();
for($i=0; $i < count($seleccionadosmarcageneral); $i++){
     

  foreach ($mostrarmarcaobjetos as $imarca){
     if($imarca->marca==$seleccionadosmarcageneral[$i]){

        $banderamarca=1;
     }
      if($banderamarca==0){
    $obj->eliminarMarca($seleccionadosmarcageneral[$i]);


}}}

$seleccionadosestadogeneral = $_POST['estadogeneral'];
  $mostrar=$obj->mostrar_todos_los_componentes();
for($i=0; $i < count($seleccionadosestadogeneral); $i++){


 foreach ($mostrar as $iestado){
     if($iestado->estado==$seleccionadosestadogeneral[$i]){

        $banderaestado=1;
     }

 }
 if($banderaestado==0){
    $obj->eliminarEstado($seleccionadosestadogeneral[$i]);
 }

}
$seleccionadostipogeneral = $_POST['tipogeneral'];
$mostrar=$obj->mostrar_todos_los_componentes();
for($i=0; $i < count($seleccionadostipogeneral); $i++){


  foreach ($mostrar as $itipo){
     if($itipo->tipo==$seleccionadostipogeneral[$i]){

        $banderatipo=1;


 }}
 if($banderatipo==0){
    $obj->eliminarTipo($seleccionadostipogeneral[$i]);
 }

}
//<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
//<p style='color:red;' id='mensaje'><strong>Error al insertar</strong></p>";"
//
       echo "

<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se elimino correctamente </strong></p>";

  
?>