<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author rafael
 */
include_once '../modelo/ModeloLog.php';
$numeroinventariocomponentee = htmlspecialchars($_POST["idcheckbox"]);
$tipohddd = htmlspecialchars($_POST["tipohdd"]);
$seriehddd = htmlspecialchars($_POST["seriehdd"]);
$capacidadhddd = htmlspecialchars($_POST["capacidadhdd"]);

$objjj = new ModeloLog();


$objjj->insertar_hdd($tipohddd, $seriehddd, $capacidadhddd, $numeroinventariocomponentee);
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><strong>Se inserto correctamente</strong></p>";
?>





