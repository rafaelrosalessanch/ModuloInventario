<?php
session_start();
include_once '../modelo/ModeloLog.php';
$obj = new ModeloLog();
$usuario = $_REQUEST['usuario'];
$contraseña = $_REQUEST['contraseña'];
$mostrar = $obj->mostrar_loginAdministracion($usuario);
foreach ($mostrar as $i) {
    $user = $i->usuario;
    $pass = $i->contraseña;
}
if (($usuario == NULL) || ($contraseña == NULL)||($usuario != $user) || ($contraseña != $pass)) {
    header("location:../vistas/loginAdministracion.php");
}
    else {
    $_SESSION['usuarioAdministracion']=$usuario;
 header("Location: ../vistas/administracion.php");
}


?>
