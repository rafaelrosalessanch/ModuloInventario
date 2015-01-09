<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
session_start();
include '../modelo/ModeloLog.php';
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_usuarios();

$ci = htmlspecialchars($_POST['orderBox']);

   
    foreach ($mostrar as $i) {
      
if($ci==$i->ci){
    $_SESSION['ci']=$ci;

      $_SESSION['nombreyapellidos']=$i->nombreusuario.' '.$i->apellidos;
       $_SESSION['cargo']=$i->cargo;
        $_SESSION['departamentoo']=$i->departamento;
        
       

}
}
?>
