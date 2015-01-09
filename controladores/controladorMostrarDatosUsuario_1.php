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
$obj = new ModeloLog();
$extract = extract($_GET);
$usuario = htmlspecialchars($_POST["opcionesusuario"]);
$mostrar=$obj->mostrar_todos_los_usuarios();
foreach ($mostrar as $i) {
   if($i->usuario==$usuario){

           echo "<input id='op' value='$i->administracion' style='width: 90px;' ></input>";
   }
}
?>





