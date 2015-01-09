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
$nombreusuarioglobal = htmlspecialchars($_POST['usuario']);


if ($objconnect->Conectar() == NULL) {
    echo "
<p style='color:darkred;margin-left:-30px;font-size: 14px' id='mensaje'><strong>Error de conexion</strong></p>";
}
    $contrasenaa = $objeto->consultarUsuariogloball($nombreusuarioglobal);
    if ($contrasenaa == NULL) {
   echo "
<script language='javascript' type='text/javascript'>
var varbanderauser=0;
</scipt>
";
    } else {
        echo "
<p style='color:red;margin-left:-30px;font-size: 14px' id='mensaje'><strong id='elusuarioexiste'>El usuario ya existe</strong></p>
<script language='javascript' type='text/javascript'>
 var varbanderauser=1;
</scipt>
";
    
        
    }

?>
