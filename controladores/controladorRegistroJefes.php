<?php
include_once '../modelo/ModeloLog.php';
$obj = new ModeloLog();
$usuario = htmlspecialchars($_POST['usuario']);
$contrasena = htmlspecialchars($_POST['contrasena']);
$departamento = htmlspecialchars($_POST['opciones']);
$privilegios = htmlspecialchars($_POST['opcionesprivilegios']);
$mostrar=$obj->mostrar_todos_los_usuarios();
$bandera=0;
foreach ($mostrar as $i) {
    $usuariobd = $i->usuario;
     $departamentobd = $i->departamento;
    if ((($usuario==$usuariobd)&&($departamento==$departamentobd))||$departamento=='Seleccionar'||$privilegios=='Seleccionar') {

         $bandera=1;
    }
}
if($bandera==0){
$obj->insertarUsuarioJefes($usuario, $contrasena, $departamento, $privilegios);

     echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se insert&oacute; correctamente</strong></p>";



}
 else {

   echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en los datos</strong></p>";

        
}
?>
