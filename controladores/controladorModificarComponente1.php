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

$obj=new ModeloLog();
$numeroinventario=htmlspecialchars($_POST['radiocomponenteasignar']);

$numeroserienuevo=htmlspecialchars($_POST['numseriemodificar']);
$marcanuevo=htmlspecialchars($_POST['marcamodificar']);
$modelonuevo=htmlspecialchars($_POST['modelomodificar']);
$estadonuevo=htmlspecialchars($_POST['estadomodificar']);
$numeroinventarionuevo=htmlspecialchars($_POST['numinventariomodificar']);
$observacionnuevo=htmlspecialchars($_POST['observacionsmodificar']);
$mostrar=$obj->mostrar_todos_los_componentes();
 foreach ($mostrar as $i) {

 if($i->numeroinventario==$numeroinventario){
 if($numeroserienuevo==""){
     $numeroserienuevo=$i->numserie;
 }
  if($marcanuevo=="Seleccionar"){
     $marcanuevo=$i->marca;
    
 }
   if($modelonuevo==""){
     $modelonuevo=$i->modelo;
 }
    if($estadonuevo=="Seleccionar"){
     $estadonuevo=$i->estado;
     
 }
    if($numeroinventarionuevo==""){
     $numeroinventarionuevo=$i->numeroinventario;
 }
    if($observacionnuevo==""){
     $observacionnuevo=$i->observaciones;
    
 }
 }
 }

if($obj->cambiarcomponente($numeroinventario,$modelonuevo,$numeroserienuevo,$observacionnuevo,$numeroinventarionuevo,$marcanuevo,$estadonuevo)==true){
            $fecha=date("d-m-Y H:i:s");
            session_start();
            $usuario = $_SESSION['usuario'];
        $mostrar=$obj->mostrar_todos_los_componentes();
        foreach ($mostrar as $i) {
            if ($i->numeroinventario == $numeroinventario) {
                $tipo=$i->tipo;
                $marca=$i->marca;
                $estacion=$i->estacion;
                $obj->registrar_trazas_componentes($tipo, $marca, $i->numeroinventario,'sin', $fecha, $usuario, 'Modificado', "sin cambios",$estacion,'Ejecutada correctamente');
            }
        }
    echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='17' height='17' /><strong>Se modifico correctamente</strong></p>";



}  else {
      foreach ($mostrar as $i) {
            if ($i->numeroinventario == $numeroinventario) {
                $tipo=$i->tipo;
                $marca=$i->marca;
                $estacion=$i->estacion;
                $obj->registrar_trazas_componentes($tipo, $marca, $i->numeroinventario,'sin', $fecha, $usuario, 'Modificado', "sin cambios",$estacion,'Ejecutada incorrectamente');
            }
        }
     echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;margin-left:-30px' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error al modificar el activo</strong></p>";

}

?>





