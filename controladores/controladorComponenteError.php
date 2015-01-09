<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */


error_reporting(E_ALL ^ E_NOTICE);
session_start();

$error=$_SESSION['error'];
    if ($error==1) {
     
        echo "

<p style='color:red;' id='mensajeee'><strong>Error al introducir los datos</strong></p>";
    }   if ($error==0) {
       
      

    echo "

<p style='color:green;' id='mensajeee'><strong>Se inserto correctamente</strong></p>";

    }    if ($error==2) {
         
       echo "

<p style='color:red;' id='mensajeee'><strong>Ya existe un componente con el mismo Num inventario</strong></p>";


        
    
}



?>