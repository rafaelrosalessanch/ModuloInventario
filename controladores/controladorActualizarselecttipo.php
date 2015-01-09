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
$mostrar = $objregistrar->mostrar_tipo_de_componente();


echo "<option>Seleccionar</option>";
   
    foreach ($mostrar as $i) {
      
      
    echo "<option>$i->nombretipoobjeto</option>";
        
    
    

}
?>





