<?php
include_once '../modelo/ModeloLog.php';
$usuari = htmlspecialchars($_POST['opcionesusuario']);


$obj=new ModeloLog();
if($usuari==NULL){

     echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;margin-left:-30px' id='mensajeee'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione un usuario</strong></p>";

    }  else {



if ($obj->eliminarUsuario($usuari) == TRUE) {
             echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensajeee'><img src='/images/correcto.jpg' alt='' width='17' height='17' /><strong>Se elimino correctamente</strong></p>";

        } else {
            echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;margin-left:-30px' id='mensajeee'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error al eliminar el usuario</strong></p>";

        }}
?>
