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
$mostrar = $objregistrar->mostrar_estaciones();

foreach ($mostrar as $i) {

// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
  echo "<p id='pvincular$i->nombreubicacionnickdepartamento' value='$i->nombreubicacionnickdepartamento'><input id='inputvincular$i->nombreubicacionnickdepartamento' type='radio' value='$i->nombreubicacionnickdepartamento' name='orderBox'>$i->nombreestacion</p>";
//

}
?>





