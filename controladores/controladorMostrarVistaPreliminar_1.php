<?php
session_start();
$_SESSION['vistapreliminar']=NULL;
$_SESSION['cantidadvistapreliminar']=NULL;
$cont=0;

    $numero=htmlspecialchars($_POST["numero"]);
    $count = count($numero);
    for ($i = 0; $i < $count; $i++) {
       $_SESSION['vistapreliminar'].=$numero[$i].',';
    $cont++;

    }

$_SESSION['cantidadvistapreliminar']=$cont;

?>
