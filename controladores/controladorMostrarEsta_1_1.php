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
session_start();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_estaciones();
$_SESSION['depaselecc']=htmlspecialchars($_POST["opcionesverdepartamentos"]);
$departamentoo=htmlspecialchars($_POST["opcionesverdepartamentos"]);
$_SESSION['depaselecc']="$departamentoo";
//        $_SESSION['depaseleccc']="$departamentoo";
if($_SESSION['depaselecc']!='Todos'&&$_SESSION['depaselecc']!='Seleccionar'){
foreach ($mostrar as $i) {

// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
    if($_SESSION['depaselecc']==$i->departamento)
  echo "<p id='pvincular$i->nombreubicacionnickdepartamento' value='$i->nombreubicacionnickdepartamento'><input id='inputvincular$i->nombreubicacionnickdepartamento' type='radio' value='$i->nombreubicacionnickdepartamento' name='orderBox'>$i->nombreestacion</p>";
//

}}else {

  foreach ($mostrar as $i) {

// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
    
  echo "<p id='pvincular$i->nombreubicacionnickdepartamento' value='$i->nombreubicacionnickdepartamento'><input id='inputvincular$i->nombreubicacionnickdepartamento' type='radio' value='$i->nombreubicacionnickdepartamento' name='orderBox'>$i->nombreestacion</p>";
//

}
}

?>





