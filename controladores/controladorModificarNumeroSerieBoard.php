<?php
session_start();
include_once '../modelo/ModeloLog.php';
$departamento = htmlspecialchars($_POST['numeroserieboard']);
$activo = htmlspecialchars($_POST['idcheckbox']);

if ($departamento == null||$activo == null) {
   echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en los datos</strong></p>";

} else {
   
    $obj = new ModeloLog();
     $obj->insertar_numero_serie_board($activo,$departamento);

    
   echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se modifico correctamente</strong></p>";
            
}
?>
