<?php

session_start();
include_once '../modelo/ModeloLog.php';

echo htmlspecialchars($_POST['idcheckbox']);
$_SESSION['numeroinventarioseleccionado']=htmlspecialchars($_POST['idcheckbox']);

?>
