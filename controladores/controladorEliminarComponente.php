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


$fecha=date("d-m-Y H:i:s");
session_start();
 $usuario = $_SESSION['usuario'];
$mostrar=$obj->mostrar_todos_los_componentes();
        foreach ($mostrar as $i) {
            if (utf8_decode($i->numeroinventario) == $numeroinventario) {
                $tipo=utf8_decode($i->tipo);
                $marca=utf8_decode($i->marca);
                $estacion=utf8_decode($i->estacion);
                $obj->registrar_trazas_componentes($tipo, $marca, utf8_decode($i->numeroinventario),'sin', $fecha, $usuario, 'Eliminado', "sin cambios",$estacion);
            }
        }
$obj->eliminarComponente($numeroinventario);
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se elimin&oacute; correctamente</strong></p>";



?>





