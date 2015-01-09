<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
include_once '../modelo/ModeloLog.php';
$estado =htmlspecialchars($_POST['opcioneseliminarestado']);
$marca =htmlspecialchars($_POST['opcioneseliminarmarca']);
$tipo =htmlspecialchars($_POST['opcioneseliminartipo']);

return validarEliminarAtributos($estado,$marca,$tipo);

function validarEliminarAtributos($estado,$marca,$tipo){
$banderaestado=0;
$banderamarca=0;
$banderatipo=0;
$banderasms=0;
if($estado=='Seleccionar'&&$marca=='Seleccionar'&&$tipo=='Seleccionar'){
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione al menos un Atributo</strong></p>";

}  else {


 $obj=new ModeloLog();
 $mostrar=$obj->mostrar_todos_los_componentes();
 if($estado!='Seleccionar'){
 foreach ($mostrar as $i){
     if($i->estado==$estado){
       
        $banderaestado=1;
     }

 }} 
 $mostrarmarcaobjetos=$obj->mostrar_todos_los_componentes();
 if($marca!='Seleccionar'){
  foreach ($mostrarmarcaobjetos as $imarca){
     if($imarca->marca==$marca){

        $banderamarca=1;
     }

 }} 
 $mostrar=$obj->mostrar_todos_los_componentes();
 if($tipo!='Seleccionar'){
  foreach ($mostrar as $itipo){
     if($itipo->tipo==$tipo){

        $banderatipo=1;
     }

 }} 
 
 if($banderaestado==0&&$banderamarca==1&&$banderatipo==1&&$estado!='Seleccionar'){
     $obj->eliminarEstado($estado);
     echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se eliminó correctamente el estado</strong></p>";
$banderasms=1;
     }
    
   if($banderaestado==1&&$banderamarca==0&&$banderatipo==1&&$marca!='Seleccionar'){

       $obj->eliminarMarca($marca);
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se eliminó correctamente la marca</strong></p>";
$banderasms=1;
     }
      if($banderaestado==1&&$banderamarca==1&&$banderatipo==0&&$tipo!='Seleccionar'){

       $obj->eliminarTipo($tipo);
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se eliminó correctamente el tipo</strong></p>";
$banderasms=1;
     }
    if($banderaestado==0&&$banderamarca==0&&$banderatipo==1&&$estado!='Seleccionar'&&$marca!='Seleccionar'){
     $obj->eliminarEstado($estado);
       $obj->eliminarMarca($marca);
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se eliminó correctamente la marca y el estado</strong></p>";
$banderasms=1;
     }
    if($banderaestado==0&&$banderamarca==1&&$banderatipo==0&&$estado!='Seleccionar'&&$tipo!='Seleccionar'){
     $obj->eliminarEstado($estado);

       $obj->eliminarTipo($tipo);
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se eliminó correctamente el estado y el tipo</strong></p>";
$banderasms=1;
     }
     if($banderaestado==1&&$banderamarca==0&&$banderatipo==0&&$tipo!='Seleccionar'&&$marca!='Seleccionar'){

       $obj->eliminarMarca($marca);
       $obj->eliminarTipo($tipo);
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se eliminó correctamente la marca y el tipo</strong></p>";
$banderasms=1;
     }
     if($banderaestado==0&&$banderamarca==0&&$banderatipo==0){

         $obj->eliminarEstado($estado);
       $obj->eliminarMarca($marca);
       $obj->eliminarTipo($tipo);
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se eliminó correctamente</strong></p>";
      $banderasms=1;
     }
     if($banderasms!=1){
   echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error al eliminar</strong></p>";

     }
     }}
?>
