<?php

session_start();
include_once '../modelo/ModeloLog.php';
$usuarioseleccionado = htmlspecialchars($_POST['opcionesusuario']);
$nombreusuario = htmlspecialchars($_POST['usuario']);
$contrasena = htmlspecialchars($_POST['contrasena']);
$departamento = htmlspecialchars($_POST['opciones']);
$privilegios = htmlspecialchars($_POST['opcionesprivilegios']);
$estado = htmlspecialchars($_POST['opcionesestado']);
$jefe = htmlspecialchars($_POST['opcionesjefe']);
$bandera=0;
$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_usuarios();
foreach ($mostrar as $i) {
    if ($i->usuario == $usuarioseleccionado) {
        if ($nombreusuario == '')
            $nombreusuario = $i->usuario;
        if ($contrasena == '')
            $contrasena = $i->contrasena;
        if ($departamento == 'Seleccionar')
            $departamento = $i->departamento;
        if ($privilegios == 'Seleccionar')
            $privilegios = $i->administracion;
        if ($estado == 'Seleccionar'){
            $estado = $i->estado;}  else {
            if ($estado == 'Habilitado'){
            $estado = 1;}  else {
                 $estado = 0;
            }

        }
        if ($jefe == 'No')
            $jefe = $i->jefes;
        $bandera=1;
    }

    
}
if ($bandera==1){
$obj->modificarUsuario($usuarioseleccionado,$nombreusuario, $departamento, $contrasena, $privilegios,$estado,$jefe);
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensajee'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se modific&oacute; correctamente</strong></p>";
}  else {
          echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensajee'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione un usuario</strong></p>";

}
?>
