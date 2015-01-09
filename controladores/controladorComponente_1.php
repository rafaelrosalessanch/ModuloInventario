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


foreach ($mostrar as $i) {
    $compo = $i->componentepertenece;
    if (preg_match("/$nombreregistrar/", $compo)) {

        echo "<option>$i->nombremarca</option>";
    }
}
?>





