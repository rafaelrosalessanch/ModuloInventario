<?php

session_start();
include_once '../modelo/ModeloLog.php';
include_once '../modelo/connect.php';

$objeto = new ModeloLog();
$objconnect = new Connect();
$_SESSION['usuario'] = NULL;
$_SESSION['tipoconsultados'] = 'Total de activos:';
$_SESSION['estadoimprimirr'] = 'Seleccionar';
$_SESSION['marcacomponenteregistrar'] = 'Seleccionar';
$_SESSION["activarfiltro"] = FALSE;
$_SESSION['tipoimprimirr'] = 'Seleccionar';
$_SESSION['departamento'] = NULL;
$_SESSION['administrador'] = NULL;
$_SESSION['depaselecc'] = NULL;
$_SESSION['estacion'] = NULL;
$nombreusuarioglobal = htmlspecialchars($_POST['usuarioregistrado']);
$contrasena = htmlspecialchars($_POST['contrasenaregistrada']);
$bandera = 0;

if ($objconnect->Conectar() == NULL) {
    echo "
<p style='color:darkred;margin-left:-30px;font-size: 14px' id='mensaje'><strong>Error de conexion</strong></p>";
}

if ($nombreusuarioglobal == null || $contrasena == null) {
    } else {

    $contrasenaa = $objeto->consultarUsuariogloball($nombreusuarioglobal);
    if ($contrasenaa != NULL) {
        foreach ($contrasenaa as $i) {
            if ($i->contrasenausuarioglobal == $contrasena) {
                $_SESSION['usuario'] = $nombreusuarioglobal;
                echo '<script language="javascript" type="text/javascript">
location.href="../vistasnuevas/informatica.php";
</script>';
                break;
            } else {
                echo "
<p style='color:#CC0000;margin-left:-30px;font-size: 14px' id='mensaje'><strong>Usuario o contrasena incorrecta</strong></p>";
                break;
            }
        }
    } else {
        echo "
<p style='color:#CC0000;margin-left:-30px;font-size: 14px' id='mensaje'><strong>Usuario o contrasena incorrectaa</strong></p>";
    }
}
?>
