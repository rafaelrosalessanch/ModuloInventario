<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */

include '../modelo/ModeloLog.php';
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_marca_de_todos_componentes();

foreach ($mostrar as $i) {
    
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
 echo "<p id='pvincular$i->nombremarca' value='$i->nombremarca'><input id='inputvincular$i->nombremarca' type='radio' value='$i->nombremarca' name='orderBox'>$i->nombremarca</p>";
//
    
}
?>





