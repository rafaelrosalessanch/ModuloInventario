<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
$nombreregistrar = htmlspecialchars($_POST["tipocomponenteregistrar"]);
include '';
include '../modelo/ModeloLog.php';
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_marca_de_todos_componentes();
$banderaaaa=0;
echo "<option>Seleccionar</option>";
foreach ($mostrar as $i) {
    $compo = $i->componentepertenece;
    if (preg_match("/$nombreregistrar/", $compo)) {
$banderaaaa=1;
        echo "<option>$i->nombremarca</option>";
    }
}
if($banderaaaa==0){
    echo "<option>Seleccionar</option>";
}
?>





