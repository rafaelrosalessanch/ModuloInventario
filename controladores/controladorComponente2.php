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
echo"<option>Seleccionar</option>";
foreach ($mostrar as $i) {
    
        echo "<option>$i->nombremarca</option>";
    
}
?>





