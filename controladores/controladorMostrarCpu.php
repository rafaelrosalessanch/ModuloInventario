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
$mostrar = $objregistrar->mostrar_cpu();
$numero=$_SESSION['numeroinventarioseleccionado'];
foreach ($mostrar as $i) {
if($numero==$i->idobjeto)
  echo "<p id='pvincular$i->marca' value='$i->marca'><input id='inputvincular$i->marca' type='radio' value='$i->idcpu' name='orderBox'>$i->marca($i->velocidadcpu)</p>";
//

}
?>





