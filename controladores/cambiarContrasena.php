<?php
include_once '../modelo/ModeloLog.php';
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cambiarContrasena
 *
 * @author rafael
 */
session_start();
$usuario=$_SESSION['usuario'];
$contrasena=$_REQUEST['contrasena'];

$contrasenaconf=$_REQUEST['contrasenaconf'];
$obj=new ModeloLog();

$mostrarcom=$obj->consultar_contrasena_usuario($usuario);
foreach ($mostrarcom as $i) {
    $campo = $i->contrasena;}

if($campo==$contrasena){
$obj->cambiarcontrasena($usuario, $contrasenaconf);
echo '<script language="javascript" type="text/javascript">
            alert("La contrase\u00f1a se cambi\u00f3 correctamente")
history.go(-2);
</script>';
}  else {
    echo '<script language="javascript" type="text/javascript">
            alert("La contrase\u00f1a actual no la insert\u00f3 correctamente")
history.go(-1);
</script>';
}
?>
