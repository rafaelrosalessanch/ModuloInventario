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
session_start();
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_hdd();
$numero=$_SESSION['numeroinventarioseleccionado'];
foreach ($mostrar as $i) {
if($numero==$i->idobjeto)
  echo "<p id='pvincular$i->marcadiscoduro' value='$i->marcadiscoduro'><input id='inputvincular$i->marcadiscoduro' type='radio' value='$i->iddiscoduro' name='orderBoxhd'>$i->marcadiscoduro($i->capacidaddiscoduro)</p>";
//

}
?>





